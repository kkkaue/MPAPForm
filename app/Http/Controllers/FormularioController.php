<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormularioRequest;
use App\Mail\InscricaoConfirmadaEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Anexo;
use App\Models\Cargo;
use App\Models\Formulario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;

class FormularioController extends Controller
{
    private $htmlFile;
    private $pdfOutputFile;
    private $htmlTemp;
    public function generatePdfTest()
    {
        $html = view('pdf.inscricao', [
            'codigo' => 123,
            'user' => [
                'nome' => 'Kaue de magalhães',
                'email' => 'exemplo@exemplo.com',
                'cpf' => '123.456.789-10',
                'nome_rua' => 'rua abc',
                'numero_rua' => '123',
                'telefone_1' => '(09) 90909-0909',
                'curriculo_lattes' => 'lattes.cnpq.br/123456789',
                'cargo_id' => '1',
            ]
        ])->render();

        $htmlTemp = tempnam(sys_get_temp_dir(), 'html_');

        // Acrescente a extensão .html para o arquivo final
        $htmlFile = $htmlTemp . '.html';
        file_put_contents($htmlFile, $html);

        //dd($htmlFile);
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $htmlFile = str_replace('\\', '\\\\', $htmlFile);
            $pdfOutputFile = 'c:\\xampp\\htdocs\\mpap-form2\\mpap-form\\public\\output.pdf';
            $command = "start chrome --headless --disable-gpu --no-pdf-header-footer --disable-pdf-tagging --print-to-pdf=\"$pdfOutputFile\" \"file:///$htmlFile\"";
        } else { 
            $command = "google-chrome-stable --headless --disable-gpu --no-pdf-header-footer --disable-pdf-tagging --print-to-pdf= file://$htmlFile";
        }
        
        shell_exec($command);

        $tempoMaximo = 5; 

        $tempoInicial = time();
        while (!file_exists($pdfOutputFile) && (time() - $tempoInicial) < $tempoMaximo) {
            sleep(1);
        }

        if (file_exists($pdfOutputFile)) {
            $pdf = file_get_contents($pdfOutputFile);
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="output.pdf"');
            header('Content-Length: ' . strlen($pdf));
            header('Cache-Control: private, max-age=0, must-revalidate');
            header('Pragma: public');
            echo $pdf;
        } else {
            echo "O arquivo PDF não pôde ser encontrado após aguardar $tempoMaximo segundos.";
        }
        //limpar o sistema dos arquivos gerados
        unlink($htmlFile);
        unlink($pdfOutputFile);
        unlink($htmlTemp);
    }

    public function viewPdfTest()
    {
        return view ('pdf.inscricao', [
            'codigo' => '123456',
            'user' => [
                'nome' => 'Kaue de magalhães',
                'email' => 'exemplo@exemplo.com',
                'cpf' => '123.456.789-10',
                "nome_rua" => "rua abc",
                "numero_rua" => "123",
                "telefone_1" => "(09) 90909-0909",
                "curriculo_lattes" => "lattes.cnpq.br/123456789",
                "cargo_id" => "1",
            ]
        ]);
    }

    public function generatePdf($codigo, $request, $created_at)
    {
        $html = view('pdf.inscricao', [
            'codigo' => $codigo,
            'user' => [
                'nome' => $request['nome'],
                'email' => $request['email'],
                'cpf' => $request['cpf'],
                'nome_rua' => $request['nome_rua'],
                'numero_rua' => $request['numero_rua'],
                'telefone_1' => $request['telefone_1'],
                'curriculo_lattes' => $request['curriculo_lattes'],
                'cargo_id' => $request['cargo_id'],
            ],
            'created_at' => $created_at
        ])->render();

        
        $htmlTemp = tempnam(sys_get_temp_dir(), 'html_');
        
        // Acrescente a extensão .html para o arquivo final
        $htmlFile = $htmlTemp . '.html';
        file_put_contents($htmlFile, $html);

        $pdfOutputFile = '/home/kaue/codes/mpap_form/teste2/public/output.pdf';
        
        //dd($htmlFile);
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $htmlFile = str_replace('\\', '\\\\', $htmlFile);
            $pdfOutputFile = 'c:\\xampp\\htdocs\\mpap-form2\\mpap-form\\public\\output.pdf';
            $command = "start chrome --headless --disable-gpu --no-pdf-header-footer --disable-pdf-tagging --print-to-pdf=\"$pdfOutputFile\" \"file:///$htmlFile\"";
        } else { 
            $command = "google-chrome-stable --headless --disable-gpu --no-pdf-header-footer --disable-pdf-tagging --print-to-pdf= file://$htmlFile";
        }
        
        shell_exec($command);
        
        $tempoMaximo = 20;
        
        $tempoInicial = time();
        while (!file_exists($pdfOutputFile) && (time() - $tempoInicial) < $tempoMaximo) {
            sleep(1);
        }
        
        //PENSAR EM COMO MODIFICAR ISSO PARA ENVIAR PARA O USUÁRIO POR EMAIL E DEPOIS APAGAR O ARQUIVO
        if (file_exists($pdfOutputFile)) {
            $pdf = file_get_contents($pdfOutputFile);

        } else {
            echo "O arquivo PDF não pôde ser encontrado após aguardar $tempoMaximo segundos.";
        }
        
        $this->htmlFile = $htmlFile;
        $this->pdfOutputFile = $pdfOutputFile;
        $this->htmlTemp = $htmlTemp;
        
        return $pdf;
    }

    private function cleanTemporaryFiles()
    {
        // Limpar o sistema dos arquivos gerados
        unlink($this->htmlFile);
        unlink($this->pdfOutputFile);
        unlink($this->htmlTemp);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cargos = Cargo::pluck('nome', 'id')->toArray();
        return view('welcome', compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormularioRequest $request)
    {
        //dd($request->all());
        //validar os arquivos, todos devem ser menores do que 5 MB e serem PDF, não será aceito nenhum outro formato
        $files = $request->allFiles();
        foreach ($files as $key => $value) {
            // deve verificar se o value não é um array de arquivos
            if (is_array($value)){
                foreach ($value as $key => $file) {
                    if ($file->getSize() > 5000000){
                        return redirect()->back()->with('error', 'Falha no envio dos documentos! O arquivo ' . $file->getClientOriginalName() . ' é maior que 5MB!');
                    }
                    if ($file->extension() != 'pdf'){
                        return redirect()->back()->with('error', 'Falha no envio dos documentos! O arquivo ' . $file->getClientOriginalName() . ' não é PDF!');
                    }
                }
            } else {
                if ($value->getSize() > 5000000){
                    return redirect()->back()->with('error', 'Falha no envio dos documentos! O arquivo ' . $value->getClientOriginalName() . ' é maior que 5MB!');
                }
                if ($value->extension() != 'pdf'){
                    return redirect()->back()->with('error', 'Falha no envio dos documentos! O arquivo ' . $value->getClientOriginalName() . ' não é do tipo pdf!');
                }
            }
        }
        
        //verifique o valor de cargo_id
        $cargoId = $request->cargo_id;
        if($cargoId == 1){
            $requestExceptRadioInputs = new FormularioRequest($request->except(['experiencia_profissional_radio','trabalho_voluntario_radio', 'comprovante_matricula_radio']));
            $resposta = $this->handleCargo1($requestExceptRadioInputs);
        } elseif ($cargoId == 2){
            $resposta = $this->handleCargo2($request);
        } elseif ($cargoId == 3){
            $resposta = $this->handleCargo3($request);
        } elseif ($cargoId == 4){
            $resposta = $this->handleCargo4($request);
        } elseif ($cargoId == 5){
            $resposta = $this->handleCargo5($request);
        } elseif ($cargoId == 6){
            $resposta = $this->handleCargo6($request);
        } else {
            return redirect()->back()->with('error', 'Falha no envio dos documentos!');
        } 

        if ($resposta['status']){
            $pdf = $this->generatePdf($resposta['codigo'], $request->except(['_token']), Formulario::where('codigo', $resposta['codigo'])->first()->created_at);
            Mail::to($request->email)->send(new InscricaoConfirmadaEmail($resposta['codigo'], $request->nome, $pdf));
            $this->cleanTemporaryFiles();
            return redirect()->back()->with('success', 'Você está quase lá! para finalizar o processo, por favor, verifique seu email e valide sua inscrição!');
        } else {
            return redirect()->back()->with('error', 'Falha no envio dos documentos!');
        }
    }

    public function validar($codigo){
        
        $dado = Formulario::where('codigo', $codigo)->first();
        if ($dado){
            $dado->update(['codigo_validacao' => true]);
            echo "Inscrição validada com sucesso!";
        } else {
            echo "cadastro não encontrado";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function handleCargo(FormularioRequest $request, array $files) {
        $novo = Formulario::firstOrCreate($request->except(['_token', ...$files]));
        $codigo = rand();
        $novo->update(['codigo' => $codigo]);
        $novo->update(['codigo_validacao' => false]);

        foreach ($files as $key => $value) {
            if ($request->$value){
                if(is_array($request->$value)){
                    foreach ($request->$value as $key => $file) {
                        $this->uploadFile($file, $value, $value, $novo);
                    }
                } else {
                    $this->uploadFile($request->$value, $value, $value, $novo);
                }
            }
        }

        return ['status' => true, 'codigo' => $codigo];
    }    

    private function handleCargo1(FormularioRequest $request) : array
    {
        $files = ['historico_escolar', 'comprovante_matricula', 'experiencia_profissional', 'trabalho_voluntario'];
        return $this->handleCargo($request, $files);
    }

    private function handleCargo2(FormularioRequest $request){
        $files = ['certificado_ensino_medio', 'diploma_graduacao', 'historico_escolar', 'curso_curta_duracao', 'curso_especializacao', 'diploma_mestrado', 'diploma_doutorado', 'aprovacao_concurso', 'experiencia_metodologias_atendimento', 'experiencia_libras'];
        return $this->handleCargo($request, $files);
    }

    private function handleCargo3(FormularioRequest $request){
        $files = ['certificado_ensino_medio', 'diploma_graduacao', 'historico_escolar', 'curso_curta_duracao', 'curso_especializacao', 'diploma_mestrado', 'diploma_doutorado', 'aprovacao_concurso', 'assessor_juridico', 'experiencia_metodologias_atendimento', 'experiencia_libras'];
        return $this->handleCargo($request, $files);
    }

    private function handleCargo4(FormularioRequest $request){
        $files = ['certificado_ensino_medio', 'diploma_graduacao', 'historico_escolar', 'curso_curta_duracao', 'curso_especializacao', 'diploma_mestrado', 'diploma_doutorado', 'aprovacao_concurso', 'experiencia_sistema_politicas_garantidoras_direito', 'experiencia_metodologias_atendimento', 'experiencia_libras'];
        return $this->handleCargo($request, $files);
    }

    private function handleCargo5(FormularioRequest $request){
        $files = ['certificado_ensino_medio', 'diploma_graduacao', 'historico_escolar', 'curso_curta_duracao', 'curso_especializacao', 'diploma_mestrado', 'diploma_doutorado', 'aprovacao_concurso', 'experiencia_sistema_politicas_garantidoras_direito', 'experiencia_metodologias_atendimento', 'experiencia_libras'];
        return $this->handleCargo($request, $files);
    }

    private function handleCargo6(FormularioRequest $request){
        $files = ['certificado_ensino_medio', 'diploma_graduacao', 'historico_escolar', 'curso_curta_duracao', 'curso_especializacao', 'diploma_mestrado', 'diploma_doutorado', 'aprovacao_concurso', 'experiencia_sistema_politicas_garantidoras_direito', 'experiencia_metodologias_atendimento', 'experiencia_libras'];
        return $this->handleCargo($request, $files);
    }

    private function uploadFile($file, $name, $label, $novo){
        $nameFile = null;
        // Verifica se informou o arquivo e se é válido
        // Define um aleatório para o arquivo baseado no timestamps atual
        $name = uniqid(date('HisYmd'));

        // Recupera a extensão do arquivo
        $extension = $file->extension();

        // Define finalmente o nome
        $nameFile = "{$name}.{$extension}";

        $link = file_get_contents($file);

        $file = 'convenios/' . $nameFile;
        // Faz o upload:
        $upload =  Storage::disk('s3')->put($file, $link);
        // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

        // Verifica se NÃO deu certo o upload (Redireciona de volta)
        if (!$upload)
            return redirect()
                ->back()
                ->withErrors('Falha ao fazer upload')
                ->withInput();

        $arquivo = 'https://d23jrrdgfqmi9v.cloudfront.net/' . $file;
        Anexo::create([
            'formulario_id' => $novo->id,
            'cargo_id' => $novo->cargo_id,
            'arquivo' => $arquivo,
            'label' => $label
            ]);
    }

    function getNodeAndNpmPaths() {
        $nodeBinary = '';
        $npmBinary = '';
    
        if ($this->isWindows()) {
            $nodeBinary = 'C:\\Program Files\\nodejs\\node.exe';
            $npmBinary = 'C:\Users\kaue.brandao\AppData\Roaming\npm';
        } else {
            $nodeBinary = '/home/kaue/.nvm/versions/node/v18.17.0/bin/node';
            $npmBinary = '/home/kaue/.nvm/versions/node/v18.17.0/bin/npm';
        }
    
        return [
            'node' => $nodeBinary,
            'npm' => $npmBinary
        ];
    }
    
    function isWindows() {
        return strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
    }
}
