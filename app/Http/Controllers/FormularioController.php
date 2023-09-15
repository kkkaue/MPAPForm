<?php

namespace App\Http\Controllers;

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
        dd($request->all());
        if($request->cargo_id == 1){
            $novo = Formulario::firstOrCreate($request->except(['_token', 'historico_escolar', 'comprovante_matricula', 'experiencia_profissional', 'trabalho_voluntario']));

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
                    Anexo::create([
                        'formulario_id' => $novo->id,
                        'cargo_id' => $novo->cargo_id,
                        'arquivo' => $arquivo_experiencia,
                        'label' => 'experiencia'
                    ]);
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
            return redirect()->back()->with('mensagem', 'Cadastro feito com sucesso.');
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
}
