<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormularioRequest;
use App\Mail\InscricaoConfirmadaEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Anexo;
use App\Models\Cargo;
use App\Models\Formulario;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormularioController extends Controller
{
    public function pdfTest()
    {
        $dados = [
            'codigo' => '123456',
            'user' => [
                'nome' => 'Kaue de magalhães',
                'email' => 'exemplo@exemplo.com',
                'cpf' => '123.456.789-10',
                "nome_rua" => "rua abc",
                "numero_rua" => "123",
                "telefone_1" => "(09) 90909-0909",
                "curriculo_lattes" => "lattes.cnpq.br/1687231420914916",
                "cargo_id" => "1",
            ],
            'created_at' => new DateTime()
        ];

        $pdf = Pdf::loadView('pdf.inscricao', $dados);
        return $pdf->stream();
    }

    public function generatePdf($codigo, $request, $created_at)
    {
        $dados = [
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
        ];
        $pdf = Pdf::loadView('pdf.inscricao', $dados)->output();

        return $pdf;
    }

    public function gerarPDF($codigo)
    {

        $a = Formulario::where('codigo', $codigo)->first();
        $dados = [
            'codigo' => $codigo,
            'user' => [
                'nome' => $a['nome'],
                'email' => $a['email'],
                'cpf' => $a['cpf'],
                'nome_rua' => $a['nome_rua'],
                'numero_rua' => $a['numero_rua'],
                'telefone_1' => $a['telefone_1'],
                'curriculo_lattes' => $a['curriculo_lattes'],
                'cargo_id' => $a['cargo_id'],
            ],
            'created_at' => $a['created_at']
        ];
        $pdf = Pdf::loadView('pdf.inscricao', $dados);

        return $pdf->stream();
    }

    public function gerarPDFReenvio($codigo)
    {

        $a = Formulario::where('codigo', $codigo)->first();
        $dados = [
            'codigo' => $codigo,
            'user' => [
                'nome' => $a['nome'],
                'email' => $a['email'],
                'cpf' => $a['cpf'],
                'nome_rua' => $a['nome_rua'],
                'numero_rua' => $a['numero_rua'],
                'telefone_1' => $a['telefone_1'],
                'curriculo_lattes' => $a['curriculo_lattes'],
                'cargo_id' => $a['cargo_id'],
            ],
            'created_at' => $a['created_at']
        ];
        $pdf = Pdf::loadView('pdf.inscricao', $dados)->output();

        return $pdf;
    }

    public function verificarCPF(Request $request)
    {
        $cpf = $request->cpf;

        $cpfCadastrado = Formulario::where('cpf', $cpf)->first();

        return $cpfCadastrado ? response('true') : response('false');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cargos = Cargo::pluck('nome', 'id')->toArray();
        return view('forms.index', compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormularioRequest $request)
    {
        //dd($request->all());
        $verifica = Formulario::where('cpf', $request->cpf)->first();

        if ($verifica != null) {

            //$comprovante = $this->generatePdf($verifica->codigo, $verifica, $verifica->created_at);
            return redirect()->back()->with('erro-cpf', 'CPF já cadastrado! Clique aqui para visualizar o seu comprovante.')
                ->withInput()->with('codigo', $verifica->codigo);
        }

        //validar os arquivos, todos devem ser menores do que 5 MB e serem PDF, não será aceito nenhum outro formato
        $files = $request->allFiles();
        foreach ($files as $key => $value) {
            // deve verificar se o value não é um array de arquivos
            if (is_array($value)) {
                foreach ($value as $key => $file) {
                    if ($file->getSize() > 5000000) {
                        return redirect()->back()->with('error', 'Falha no envio dos documentos! O arquivo ' . $file->getClientOriginalName() . ' é maior que 5MB!');
                    }
                    if ($file->extension() != 'pdf') {
                        return redirect()->back()->with('error', 'Falha no envio dos documentos! O arquivo ' . $file->getClientOriginalName() . ' não é PDF!');
                    }
                }
            } else {
                if ($value->getSize() > 5000000) {
                    return redirect()->back()->with('error', 'Falha no envio dos documentos! O arquivo ' . $value->getClientOriginalName() . ' é maior que 5MB!');
                }
                if ($value->extension() != 'pdf') {
                    return redirect()->back()->with('error', 'Falha no envio dos documentos! O arquivo ' . $value->getClientOriginalName() . ' não é do tipo pdf!');
                }
            }
        }

        //verifique o valor de cargo_id
        $cargoId = $request->cargo_id;
        /* caso exista o cargo de extagiario inicialmente pedido 
        if($cargoId == 1){
            $requestExceptRadioInputs = new FormularioRequest($request->except(['experiencia_profissional_radio','trabalho_voluntario_radio', 'comprovante_matricula_radio']));
            $resposta = $this->handleCargo1($requestExceptRadioInputs);
        } */
        if ($cargoId == 2) {
            $resposta = $this->handleCargo2($request);
        } elseif ($cargoId == 3) {
            $resposta = $this->handleCargo3($request);
        } elseif ($cargoId == 4) {
            $resposta = $this->handleCargo4($request);
        } elseif ($cargoId == 5) {
            $resposta = $this->handleCargo5($request);
        } elseif ($cargoId == 6) {
            $resposta = $this->handleCargo6($request);
        } else {
            return redirect()->back()->with('error', 'Falha no envio dos documentos!');
        }

        if ($resposta['status']) {
            $pdf = $this->generatePdf($resposta['codigo'], $request->except(['_token']), Formulario::where('codigo', $resposta['codigo'])->first()->created_at);
            Mail::to($request->email)->send(new InscricaoConfirmadaEmail($resposta['codigo'], $request->nome, $pdf));
            return redirect()->back()->with('success', 'Você está quase lá! para finalizar o processo, por favor, verifique seu email e valide sua inscrição!');
        } else {
            return redirect()->back()->with('error', 'Falha no envio dos documentos!');
        }
    }

    public function validar($codigo)
    {

        $dado = Formulario::where('codigo', $codigo)->first();
        if ($dado) {
            $dado->update(['codigo_validacao' => true]);
            return view('forms.verificado');
        } else {
            return view('forms.nao-verificado');
        }
    }


    public function reenvioEmail()
    {
        $lista = Formulario::all();
        foreach ($lista as $l) {
         
            $pdf = $this->gerarPDFReenvio($l->codigo);
            $reenvio = true;
            Mail::to($l->email)->send(new InscricaoConfirmadaEmail($l->codigo, $l->nome, $pdf, $reenvio));

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

    private function handleCargo(FormularioRequest $request, array $files)
    {
        $novo = Formulario::firstOrCreate($request->except(['_token', ...$files]));
        $codigo = rand();
        $novo->update(['codigo' => $codigo]);
        $novo->update(['codigo_validacao' => false]);

        foreach ($files as $key => $value) {
            if ($request->$value) {
                if (is_array($request->$value)) {
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

    private function handleCargo1(FormularioRequest $request): array
    {
        $files = ['historico_escolar', 'certificado_ensino_medio', 'comprovante_matricula', 'experiencia_profissional', 'trabalho_voluntario'];
        return $this->handleCargo($request, $files);
    }

    private function handleCargo2(FormularioRequest $request)
    {
        $files = ['certificado_ensino_medio', 'diploma_graduacao', 'historico_escolar', 'curso_curta_duracao', 'curso_formacao_praticas_restaurativas', 'curso_especializacao', 'diploma_mestrado', 'diploma_doutorado', 'aprovacao_concurso', 'experiencia_metodologias_atendimento', 'experiencia_libras'];
        return $this->handleCargo($request, $files);
    }

    private function handleCargo3(FormularioRequest $request)
    {
        $files = ['certificado_ensino_medio', 'diploma_graduacao', 'historico_escolar', 'curso_curta_duracao', 'curso_formacao_praticas_restaurativas', 'curso_especializacao', 'diploma_mestrado', 'diploma_doutorado', 'aprovacao_concurso', 'assessor_juridico', 'experiencia_metodologias_atendimento', 'experiencia_libras'];
        return $this->handleCargo($request, $files);
    }

    private function handleCargo4(FormularioRequest $request)
    {
        $files = ['certificado_ensino_medio', 'diploma_graduacao', 'historico_escolar', 'curso_curta_duracao', 'curso_formacao_praticas_restaurativas', 'curso_especializacao', 'diploma_mestrado', 'diploma_doutorado', 'aprovacao_concurso', 'experiencia_sistema_politicas_garantidoras_direito', 'experiencia_metodologias_atendimento', 'experiencia_libras'];
        return $this->handleCargo($request, $files);
    }

    private function handleCargo5(FormularioRequest $request)
    {
        $files = ['certificado_ensino_medio', 'diploma_graduacao', 'historico_escolar', 'curso_curta_duracao', 'curso_formacao_praticas_restaurativas', 'curso_especializacao', 'diploma_mestrado', 'diploma_doutorado', 'aprovacao_concurso', 'experiencia_sistema_politicas_garantidoras_direito', 'experiencia_metodologias_atendimento', 'experiencia_libras'];
        return $this->handleCargo($request, $files);
    }

    private function handleCargo6(FormularioRequest $request)
    {
        $files = ['certificado_ensino_medio', 'diploma_graduacao', 'historico_escolar', 'curso_curta_duracao', 'curso_formacao_praticas_restaurativas', 'curso_especializacao', 'diploma_mestrado', 'diploma_doutorado', 'aprovacao_concurso', 'experiencia_sistema_politicas_garantidoras_direito', 'experiencia_metodologias_atendimento', 'experiencia_libras'];
        return $this->handleCargo($request, $files);
    }

    private function uploadFile($file, $name, $label, $novo)
    {
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
}
