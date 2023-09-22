<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|string|min:3|max:100',
            'cpf' => 'required',
            'nome_rua' => 'required',
            'numero_rua' => 'required', 
            'email' => 'required|email',
            'telefone_1' => 'required',
            'telefone_2' => 'nullable',
            'curriculo_lattes' => 'required',
            'cargo_id' => 'required|not_in:Selecione uma opção',
        ];

        $messagens = [
            'nome.required' => 'O campo Nome é obrigatório',
            'nome.string' => 'O campo Nome deve ser uma string',
            'nome.min' => 'O campo Nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo Nome deve ter no máximo 100 caracteres',
            'cpf.required' => 'O campo CPF é obrigatório',
            'nome_rua.required' => 'O campo Endereço é obrigatório',
            'numero_rua.required' => 'O campo Endereço é obrigatório',
            'email.required' => 'O campo Email é obrigatório',
            'email.email' => 'O campo Email deve ser um email válido',
            'telefone_1.required' => 'O campo Telefone é obrigatório',
            'curriculo_lattes.required' => 'O campo Currículo lattes é obrigatório',
            'cargo_id.required' => 'O campo Cargo é obrigatório',
            'cargo_id.not_in' => 'O campo Cargo é obrigatório',
        ];

        //$request->validate($regras, $messagens);
        /* dd($request->all()); */
        
        if($request->cargo_id == 1){
            $novo = Formulario::firstOrCreate($request->except(['_token', 'historico_escolar', 'comprovante_matricula', 'experiencia_profissional', 'trabalho_voluntario', 'experiencia_profissional_radio','trabalho_voluntario_radio']));
            $codigo = rand();
            $novo->update(['codigo' => $codigo]);
            if ($request->hasFile('historico_escolar')) {
                $nameFile = null;

                // Verifica se informou o arquivo e se é válido

                // Define um aleatório para o arquivo baseado no timestamps atual
                $name = uniqid(date('HisYmd'));

                // Recupera a extensão do arquivo
                $extension = $request->historico_escolar->extension();


                // Define finalmente o nome
                $nameFile = "{$name}.{$extension}";

                $link = file_get_contents($request->historico_escolar);

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

                $arquivo_historico = 'https://d23jrrdgfqmi9v.cloudfront.net/' . $file;

                Anexo::create([
                    'formulario_id' => $novo->id,
                    'cargo_id' => $novo->cargo_id,
                    'arquivo' => $arquivo_historico,
                    'label' => 'historico'
                ]);
            }

            if ($request->hasFile('comprovante_matricula')) {
                $nameFile = null;

                // Verifica se informou o arquivo e se é válido

                // Define um aleatório para o arquivo baseado no timestamps atual
                $name = uniqid(date('HisYmd'));

                // Recupera a extensão do arquivo
                $extension = $request->comprovante_matricula->extension();


                // Define finalmente o nome
                $nameFile = "{$name}.{$extension}";

                $link = file_get_contents($request->comprovante_matricula);

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

                $arquivo_comprovante = 'https://d23jrrdgfqmi9v.cloudfront.net/' . $file;

                Anexo::create([
                    'formulario_id' => $novo->id,
                    'cargo_id' => $novo->cargo_id,
                    'arquivo' => $arquivo_comprovante,
                    'label' => 'comprovante'
                ]);
            }

            if ($request->hasFile('experiencia_profissional')) {
                foreach ($request->experiencia_profissional as $key => $value) {
                    
                    $nameFile = null;
    
                    // Verifica se informou o arquivo e se é válido
    
                    // Define um aleatório para o arquivo baseado no timestamps atual
                    $name = uniqid(date('HisYmd'));
    
                    // Recupera a extensão do arquivo
                    $extension = $value->extension();
    
    
                    // Define finalmente o nome
                    $nameFile = "{$name}.{$extension}";
    
                    $link = file_get_contents($value);
    
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
    
                    $arquivo_experiencia = 'https://d23jrrdgfqmi9v.cloudfront.net/' . $file;
                    $novoAnexo = Anexo::create([
                        'formulario_id' => $novo->id,
                        'cargo_id' => $novo->cargo_id,
                        'arquivo' => $arquivo_experiencia,
                        'label' => 'experiencia'
                    ]);

                    /* $novoAnexo->update(['pontos' => $request->experiencia_profissional_radio[$key]]); */
                }
            }

            if ($request->hasFile('trabalho_voluntario')) {
                foreach ($request->trabalho_voluntario as $key => $value) {
                    $nameFile = null;
    
                    // Verifica se informou o arquivo e se é válido
    
                    // Define um aleatório para o arquivo baseado no timestamps atual
                    $name = uniqid(date('HisYmd'));
    
                    // Recupera a extensão do arquivo
                    $extension = $value->extension();
    
    
                    // Define finalmente o nome
                    $nameFile = "{$name}.{$extension}";
    
                    $link = file_get_contents($value);
    
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
    
                    $arquivo_trabalho = 'https://d23jrrdgfqmi9v.cloudfront.net/' . $file;
                    Anexo::create([
                        'formulario_id' => $novo->id,
                        'cargo_id' => $novo->cargo_id,
                        'arquivo' => $arquivo_trabalho,
                        'label' => 'trabalho'
                    ]);
                }
            }
            

            //enviar email de confimação de inscrição
            $email = new InscricaoConfirmadaEmail($codigo);
            Mail::to($request->email)->send($email);
            return redirect()->back()->with('mensagem', 'Inscrição realizada com sucesso! Por favor verifique seu email para validar sua inscrição.');
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
        
}
