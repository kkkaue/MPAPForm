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
        /* dd($request->all()); */
        
        //verifique o valor de cargo_id
        $cargoId = $request->cargo_id;
        if($cargoId == 1){
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
            return redirect()->back()->with('error', 'Falha ao realizar inscrição!');
        }

        if ($resposta['status']){
            Mail::to($request->email)->send(new InscricaoConfirmadaEmail($resposta['codigo'], $request->nome));
            return redirect()->back()->with('success', 'Inscrição realizada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Falha ao realizar inscrição!');
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

    public function test(){
        return view('mail.inscricao');
    }

    private function handleCargo(FormularioRequest $request, ...$filaLabels){
    }

    private function handleCargo1(FormularioRequest $request){
        $novo = Formulario::firstOrCreate($request->except(['_token', 'historico_escolar', 'comprovante_matricula', 'experiencia_profissional', 'trabalho_voluntario', 'experiencia_profissional_radio','trabalho_voluntario_radio', 'comprovante_matricula_radio']));
        $codigo = rand();
        $novo->update(['codigo' => $codigo]);
        $novo->update(['codigo_validacao' => false]);

        $this->uploadFile($request->historico_escolar, 'historico', 'historico', $novo);
        $this->uploadFile($request->comprovante_matricula, 'comprovante', 'comprovante', $novo);
        
        foreach ($request->experiencia_profissional as $key => $value) {
            $this->uploadFile($value, 'experiencia', 'experiencia', $novo);
        }
        foreach ($request->trabalho_voluntario as $key => $value) {
            $this->uploadFile($value, 'trabalho', 'trabalho', $novo);
        }

        return ['status' => true, 'codigo' => $codigo];
    }

    private function handleCargo2(FormularioRequest $request){
        $novo = Formulario::firstOrCreate($request->except(['_token', 'certificado_ensino_medio', 'diploma_graduacao', 'historico_escolar', 'curso_curta_duracao', 'curso_especializacao', 'diploma_mestrado', 'diploma_doutorado', 'aprovacao_concurso']));
        $codigo = rand();
        $novo->update(['codigo' => $codigo]);
        $novo->update(['codigo_validacao' => false]);

        $this->uploadFile($request->certificado_ensino_medio, 'certificado', 'certificado', $novo);
        $this->uploadFile($request->diploma_graduacao, 'diploma', 'diploma', $novo);
        $this->uploadFile($request->historico_escolar, 'historico', 'historico', $novo);

        foreach ($request->curso_curta_duracao as $key => $value) {
            $this->uploadFile($value, 'curso_curta_duracao', 'curso_curta_duracao', $novo);
        }

        foreach ($request->curso_especializacao as $key => $value) {
            $this->uploadFile($value, 'curso_especializacao', 'curso_especializacao', $novo);
        }

        foreach ($request->diploma_mestrado as $key => $value) {
            $this->uploadFile($value, 'diploma_mestrado', 'diploma_mestrado', $novo);
        }

        foreach ($request->diploma_doutorado as $key => $value) {
            $this->uploadFile($value, 'diploma_doutorado', 'diploma_doutorado', $novo);
        }

        foreach ($request->aprovacao_concurso as $key => $value) {
            $this->uploadFile($value, 'aprovacao_concurso', 'aprovacao_concurso', $novo);
        }

        return ['status' => true, 'codigo' => $codigo];
    }

    private function handleCargo3(FormularioRequest $request){
        $novo = Formulario::firstOrCreate($request->except(['_token', 'certificado_ensino_medio', 'diploma_graduacao', 'historico_escolar', 'curso_curta_duracao', 'curso_especializacao', 'diploma_mestrado', 'diploma_doutorado', 'aprovacao_concurso']));
        $codigo = rand();
        $novo->update(['codigo' => $codigo]);
        $novo->update(['codigo_validacao' => false]);

        $this->uploadFile($request->certificado_ensino_medio, 'certificado', 'certificado', $novo);
        $this->uploadFile($request->diploma_graduacao, 'diploma', 'diploma', $novo);
        $this->uploadFile($request->historico_escolar, 'historico', 'historico', $novo);

        foreach ($request->curso_curta_duracao as $key => $value) {
            $this->uploadFile($value, 'curso_curta_duracao', 'curso_curta_duracao', $novo);
        }

        foreach ($request->curso_especializacao as $key => $value) {
            $this->uploadFile($value, 'curso_especializacao', 'curso_especializacao', $novo);
        }

        foreach ($request->diploma_mestrado as $key => $value) {
            $this->uploadFile($value, 'diploma_mestrado', 'diploma_mestrado', $novo);
        }

        foreach ($request->diploma_doutorado as $key => $value) {
            $this->uploadFile($value, 'diploma_doutorado', 'diploma_doutorado', $novo);
        }

        foreach ($request->aprovacao_concurso as $key => $value) {
            $this->uploadFile($value, 'aprovacao_concurso', 'aprovacao_concurso', $novo);
        }

        return ['status' => true, 'codigo' => $codigo];
    }

    private function handleCargo4(FormularioRequest $request){
        $novo = Formulario::firstOrCreate($request->except(['_token', 'certificado_ensino_medio', 'diploma_graduacao', 'historico_escolar', 'curso_curta_duracao', 'curso_especializacao', 'diploma_mestrado', 'diploma_doutorado', 'aprovacao_concurso']));
        $codigo = rand();
        $novo->update(['codigo' => $codigo]);
        $novo->update(['codigo_validacao' => false]);

        $this->uploadFile($request->certificado_ensino_medio, 'certificado', 'certificado', $novo);
        $this->uploadFile($request->diploma_graduacao, 'diploma', 'diploma', $novo);
        $this->uploadFile($request->historico_escolar, 'historico', 'historico', $novo);

        foreach ($request->curso_curta_duracao as $key => $value) {
            $this->uploadFile($value, 'curso_curta_duracao', 'curso_curta_duracao', $novo);
        }

        foreach ($request->curso_especializacao as $key => $value) {
            $this->uploadFile($value, 'curso_especializacao', 'curso_especializacao', $novo);
        }

        foreach ($request->diploma_mestrado as $key => $value) {
            $this->uploadFile($value, 'diploma_mestrado', 'diploma_mestrado', $novo);
        }

        foreach ($request->diploma_doutorado as $key => $value) {
            $this->uploadFile($value, 'diploma_doutorado', 'diploma_doutorado', $novo);
        }

        foreach ($request->aprovacao_concurso as $key => $value) {
            $this->uploadFile($value, 'aprovacao_concurso', 'aprovacao_concurso', $novo);
        }

        return ['status' => true, 'codigo' => $codigo];
    }

    private function handleCargo5(FormularioRequest $request){
        $novo = Formulario::firstOrCreate($request->except(['_token', 'certificado_ensino_medio', 'diploma_graduacao', 'historico_escolar', 'curso_curta_duracao', 'curso_especializacao', 'diploma_mestrado', 'diploma_doutorado', 'aprovacao_concurso']));
        $codigo = rand();
        $novo->update(['codigo' => $codigo]);
        $novo->update(['codigo_validacao' => false]);

        $this->uploadFile($request->certificado_ensino_medio, 'certificado', 'certificado', $novo);
        $this->uploadFile($request->diploma_graduacao, 'diploma', 'diploma', $novo);
        $this->uploadFile($request->historico_escolar, 'historico', 'historico', $novo);

        foreach ($request->curso_curta_duracao as $key => $value) {
            $this->uploadFile($value, 'curso_curta_duracao', 'curso_curta_duracao', $novo);
        }

        foreach ($request->curso_especializacao as $key => $value) {
            $this->uploadFile($value, 'curso_especializacao', 'curso_especializacao', $novo);
        }

        foreach ($request->diploma_mestrado as $key => $value) {
            $this->uploadFile($value, 'diploma_mestrado', 'diploma_mestrado', $novo);
        }

        foreach ($request->diploma_doutorado as $key => $value) {
            $this->uploadFile($value, 'diploma_doutorado', 'diploma_doutorado', $novo);
        }

        foreach ($request->aprovacao_concurso as $key => $value) {
            $this->uploadFile($value, 'aprovacao_concurso', 'aprovacao_concurso', $novo);
        }

        return ['status' => true, 'codigo' => $codigo];
    }

    private function handleCargo6(FormularioRequest $request){
        $novo = Formulario::firstOrCreate($request->except(['_token', 'certificado_ensino_medio', 'diploma_graduacao', 'historico_escolar', 'curso_curta_duracao', 'curso_especializacao', 'diploma_mestrado', 'diploma_doutorado', 'aprovacao_concurso']));
        $codigo = rand();
        $novo->update(['codigo' => $codigo]);
        $novo->update(['codigo_validacao' => false]);

        $this->uploadFile($request->certificado_ensino_medio, 'certificado', 'certificado', $novo);
        $this->uploadFile($request->diploma_graduacao, 'diploma', 'diploma', $novo);
        $this->uploadFile($request->historico_escolar, 'historico', 'historico', $novo);

        foreach ($request->curso_curta_duracao as $key => $value) {
            $this->uploadFile($value, 'curso_curta_duracao', 'curso_curta_duracao', $novo);
        }

        foreach ($request->curso_especializacao as $key => $value) {
            $this->uploadFile($value, 'curso_especializacao', 'curso_especializacao', $novo);
        }

        foreach ($request->diploma_mestrado as $key => $value) {
            $this->uploadFile($value, 'diploma_mestrado', 'diploma_mestrado', $novo);
        }

        foreach ($request->diploma_doutorado as $key => $value) {
            $this->uploadFile($value, 'diploma_doutorado', 'diploma_doutorado', $novo);
        }

        foreach ($request->aprovacao_concurso as $key => $value) {
            $this->uploadFile($value, 'aprovacao_concurso', 'aprovacao_concurso', $novo);
        }

        return ['status' => true, 'codigo' => $codigo];
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
