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

class FormularioController extends Controller
{
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
                    return redirect()->back()->with('error', 'Falha no envio dos documentos! O arquivo ' . $value->getClientOriginalName() . ' não é PDF!');
                }
            }
        }
        
        //verifique o valor de cargo_id
        $cargoId = $request->cargo_id;
        if($cargoId == 1){
            $request = new FormularioRequest($request->except(['experiencia_profissional_radio','trabalho_voluntario_radio', 'comprovante_matricula_radio']));
            $resposta = $this->handleCargo1($request);
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
            Mail::to($request->email)->send(new InscricaoConfirmadaEmail($resposta['codigo'], $request->nome));
            return redirect()->back()->with('success', 'Inscrição realizada com sucesso!');
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
}
