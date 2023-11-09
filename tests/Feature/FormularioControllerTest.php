<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class FormularioControllerTest extends TestCase
{
    use DatabaseMigrations;
    
    public function testStoreMethodWithValidDataForFirstPosition()
    {
        //testa o caso de um candidato para a vaga de estagirario, enviando um arquivo em cada campo
        Mail::fake();

        $pdf = UploadedFile::fake()->create('document.pdf', 4000, 'application/pdf');

        $response = $this->post('/form/store', [
            '_token' => csrf_token(),
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua' => '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'telefone_2' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'cargo_id' => 1,
            'comprovante_matricula_radio' => [
                0 => '1',
            ],
            'experiencia_profissional_radio' => [
                0 => '1',
            ],
            'trabalho_voluntario_radio' => [
                0 => '1',
            ],
            'historico_escolar' => $pdf,
            'comprovante_matricula' => $pdf,
            'experiencia_profissional' => [
                0 => $pdf,
            ],
            'trabalho_voluntario' => [
                0 => $pdf,
            ],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Inscrição realizada com sucesso!');
        Mail::assertSent(\App\Mail\InscricaoConfirmadaEmail::class);

        $this->assertDatabaseHas('formularios', [
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua' => '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'telefone_2' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'codigo_validacao' => false,
            'cargo_id' => 1,
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'historico_escolar',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'comprovante_matricula',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'experiencia_profissional',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'trabalho_voluntario',
        ]);
    }

    public function testStoreMethodWithValidDataForSecondPosition()
    {
        //testa o caso de um candidato para a vaga de estagirario, enviando um arquivo em cada campo
        Mail::fake();

        $pdf = UploadedFile::fake()->create('document.pdf', 4000, 'application/pdf');

        $response = $this->post('/form/store', [
            '_token' => csrf_token(),
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua' => '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'telefone_2' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'cargo_id' => 2,
            'certificado_ensino_medio' => $pdf,
            'diploma_graduacao' => $pdf,
            'historico_escolar' => $pdf,
            'curso_curta_duracao' => [
                0 => $pdf,
            ],
            'curso_especializacao' => [
                0 => $pdf,
            ],
            'diploma_mestrado' => [
                0 => $pdf,
            ],
            'diploma_doutorado' => [
                0 => $pdf,
            ],
            'aprovacao_concurso' => [
                0 => $pdf,
            ],
            'experiencia_metodologias_atendimento' => [
                0 => $pdf,
            ],
            'experiencia_libras' => [
                0 => $pdf,
            ],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Inscrição realizada com sucesso!');
        Mail::assertSent(\App\Mail\InscricaoConfirmadaEmail::class);

        $this->assertDatabaseHas('formularios', [
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua' => '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'telefone_2' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'codigo_validacao' => false,
            'cargo_id' => 2,
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 2,
            'label' => 'certificado_ensino_medio',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 2,
            'label' => 'diploma_graduacao',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 2,
            'label' => 'historico_escolar',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 2,
            'label' => 'curso_curta_duracao',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 2,
            'label' => 'curso_especializacao',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 2,
            'label' => 'diploma_mestrado',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 2,
            'label' => 'diploma_doutorado',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 2,
            'label' => 'aprovacao_concurso',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 2,
            'label' => 'experiencia_metodologias_atendimento',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 2,
            'label' => 'experiencia_libras',
        ]);
    }

    public function testStoreMethodWithValidDataForThirdPosition()
    {
        //testa o caso de um candidato para a vaga de estagirario, enviando um arquivo em cada campo
        Mail::fake();

        $pdf = UploadedFile::fake()->create('document.pdf', 4000, 'application/pdf');

        $response = $this->post('/form/store', [
            '_token' => csrf_token(),
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua' => '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'telefone_2' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'cargo_id' => 3,
            'certificado_ensino_medio' => $pdf,
            'diploma_graduacao' => $pdf,
            'historico_escolar' => $pdf,
            'curso_curta_duracao' => [
                0 => $pdf,
            ],
            'curso_especializacao' => [
                0 => $pdf,
            ],
            'diploma_mestrado' => [
                0 => $pdf,
            ],
            'diploma_doutorado' => [
                0 => $pdf,
            ],
            'aprovacao_concurso' => [
                0 => $pdf,
            ],
            'assessor_juridico' => [
                0 => $pdf,
            ],
            'experiencia_metodologias_atendimento' => [
                0 => $pdf,
            ],
            'experiencia_libras' => [
                0 => $pdf,
            ],
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Inscrição realizada com sucesso!');
        Mail::assertSent(\App\Mail\InscricaoConfirmadaEmail::class);

        $this->assertDatabaseHas('formularios', [
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua' => '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'telefone_2' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'codigo_validacao' => false,
            'cargo_id' => 3,
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 3,
            'label' => 'certificado_ensino_medio',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 3,
            'label' => 'diploma_graduacao',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 3,
            'label' => 'historico_escolar',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 3,
            'label' => 'curso_curta_duracao',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 3,
            'label' => 'curso_especializacao',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 3,
            'label' => 'diploma_mestrado',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 3,
            'label' => 'diploma_doutorado',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 3,
            'label' => 'aprovacao_concurso',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 3,
            'label' => 'assessor_juridico',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 3,
            'label' => 'experiencia_metodologias_atendimento',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 3,
            'label' => 'experiencia_libras',
        ]);
    }

    public function testStoreMethodWithValidDataForFourthPosition()
    {
        //testa o caso de um candidato para a vaga de estagirario, enviando um arquivo em cada campo
        Mail::fake();

        $pdf = UploadedFile::fake()->create('document.pdf', 4000, 'application/pdf');

        $response = $this->post('/form/store', [
            '_token' => csrf_token(),
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua' => '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'telefone_2' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'cargo_id' => 4,
            'certificado_ensino_medio' => $pdf,
            'diploma_graduacao' => $pdf,
            'historico_escolar' => $pdf,
            'curso_curta_duracao' => [
                0 => $pdf,
            ],
            'curso_especializacao' => [
                0 => $pdf,
            ],
            'diploma_mestrado' => [
                0 => $pdf,
            ],
            'diploma_doutorado' => [
                0 => $pdf,
            ],
            'aprovacao_concurso' => [
                0 => $pdf,
            ],
            'experiencia_sistema_politicas_garantidoras_direito' => [
                0 => $pdf,
            ],
            'experiencia_metodologias_atendimento' => [
                0 => $pdf,
            ],
            'experiencia_libras' => [
                0 => $pdf,
            ],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Inscrição realizada com sucesso!');
        Mail::assertSent(\App\Mail\InscricaoConfirmadaEmail::class);

        $this->assertDatabaseHas('formularios', [
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua' => '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'telefone_2' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'codigo_validacao' => false,
            'cargo_id' => 4,
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 4,
            'label' => 'certificado_ensino_medio',
        ]);
        
        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 4,
            'label' => 'diploma_graduacao',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 4,
            'label' => 'historico_escolar',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 4,
            'label' => 'curso_curta_duracao',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 4,
            'label' => 'curso_especializacao',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 4,
            'label' => 'diploma_mestrado',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 4,
            'label' => 'diploma_doutorado',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 4,
            'label' => 'aprovacao_concurso',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 4,
            'label' => 'experiencia_sistema_politicas_garantidoras_direito',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 4,
            'label' => 'experiencia_metodologias_atendimento',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 4,
            'label' => 'experiencia_libras',
        ]);
    }

    public function testStoreMethodWithValidDataForFifthPosition()
    {
        //testa o caso de um candidato para a vaga de estagirario, enviando um arquivo em cada campo
        Mail::fake();

        $pdf = UploadedFile::fake()->create('document.pdf', 4000, 'application/pdf');

        $response = $this->post('/form/store', [
            '_token' => csrf_token(),
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua' => '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'telefone_2' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'cargo_id' => 5,
            'certificado_ensino_medio' => $pdf,
            'diploma_graduacao' => $pdf,
            'historico_escolar' => $pdf,
            'curso_curta_duracao' => [
                0 => $pdf,
            ],
            'curso_especializacao' => [
                0 => $pdf,
            ],
            'diploma_mestrado' => [
                0 => $pdf,
            ],
            'diploma_doutorado' => [
                0 => $pdf,
            ],
            'aprovacao_concurso' => [
                0 => $pdf,
            ],
            'experiencia_sistema_politicas_garantidoras_direito' => [
                0 => $pdf,
            ],
            'experiencia_metodologias_atendimento' => [
                0 => $pdf,
            ],
            'experiencia_libras' => [
                0 => $pdf,
            ],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Inscrição realizada com sucesso!');
        Mail::assertSent(\App\Mail\InscricaoConfirmadaEmail::class);

        $this->assertDatabaseHas('formularios', [
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua' => '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'telefone_2' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'codigo_validacao' => false,
            'cargo_id' => 5,
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'certificado_ensino_medio',
        ]);
        
        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'diploma_graduacao',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'historico_escolar',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'curso_curta_duracao',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'curso_especializacao',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'diploma_mestrado',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'diploma_doutorado',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'aprovacao_concurso',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'experiencia_sistema_politicas_garantidoras_direito',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'experiencia_metodologias_atendimento',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'experiencia_libras',
        ]);
    }

    public function testStoreMethodWithValidDataForSixthPosition()
    {
        //testa o caso de um candidato para a vaga de estagirario, enviando um arquivo em cada campo
        Mail::fake();

        $pdf = UploadedFile::fake()->create('document.pdf', 4000, 'application/pdf');

        $response = $this->post('/form/store', [
            '_token' => csrf_token(),
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua' => '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'telefone_2' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'cargo_id' => 5,
            'certificado_ensino_medio' => $pdf,
            'diploma_graduacao' => $pdf,
            'historico_escolar' => $pdf,
            'curso_curta_duracao' => [
                0 => $pdf,
            ],
            'curso_especializacao' => [
                0 => $pdf,
            ],
            'diploma_mestrado' => [
                0 => $pdf,
            ],
            'diploma_doutorado' => [
                0 => $pdf,
            ],
            'aprovacao_concurso' => [
                0 => $pdf,
            ],
            'experiencia_sistema_politicas_garantidoras_direito' => [
                0 => $pdf,
            ],
            'experiencia_metodologias_atendimento' => [
                0 => $pdf,
            ],
            'experiencia_libras' => [
                0 => $pdf,
            ],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Inscrição realizada com sucesso!');
        Mail::assertSent(\App\Mail\InscricaoConfirmadaEmail::class);

        $this->assertDatabaseHas('formularios', [
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua' => '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'telefone_2' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'codigo_validacao' => false,
            'cargo_id' => 5,
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'certificado_ensino_medio',
        ]);
        
        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'diploma_graduacao',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'historico_escolar',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'curso_curta_duracao',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'curso_especializacao',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'diploma_mestrado',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'diploma_doutorado',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'aprovacao_concurso',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'experiencia_sistema_politicas_garantidoras_direito',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'experiencia_metodologias_atendimento',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 5,
            'label' => 'experiencia_libras',
        ]);
    }

    public function testInvalidFileUploadWithLargerSizeThanExpected()
    {
        // testar o envio de um arquivo inválido, ou seja, que não é do tipo pdf ou do tamanho maior que 5MB
        Mail::fake();

        $pdf = UploadedFile::fake()->create('document.pdf', 6000, 'application/pdf');

        $response = $this->post('/form/store', [
            '_token' => csrf_token(),
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua' => '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'telefone_2' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'cargo_id' => 1,
            'comprovante_matricula_radio' => [
                0 => '1',
            ],
            'experiencia_profissional_radio' => [
                0 => '1',
            ],
            'trabalho_voluntario_radio' => [
                0 => '1',
            ],
            'historico_escolar' => $pdf,
            'comprovante_matricula' => $pdf,
            'experiencia_profissional' => [
                0 => $pdf,
            ],
            'trabalho_voluntario' => [
                0 => $pdf,
            ],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHas('error', 'Falha no envio dos documentos! O arquivo document.pdf é maior que 5MB!');
        Mail::assertNotSent(\App\Mail\InscricaoConfirmadaEmail::class);
    }

    public function testInvalidFileUploadWithInvalidExtension()
    {
        // testar o envio de um arquivo inválido, ou seja, que não é do tipo pdf ou do tamanho maior que 5MB
        Mail::fake();

        $pdf = UploadedFile::fake()->create('document.docx', 4000, 'application/docx');

        $response = $this->post('/form/store', [
            '_token' => csrf_token(),
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua' => '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'telefone_2' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'cargo_id' => 1,
            'comprovante_matricula_radio' => [
                0 => '1',
            ],
            'experiencia_profissional_radio' => [
                0 => '1',
            ],
            'trabalho_voluntario_radio' => [
                0 => '1',
            ],
            'historico_escolar' => $pdf,
            'comprovante_matricula' => $pdf,
            'experiencia_profissional' => [
                0 => $pdf,
            ],
            'trabalho_voluntario' => [
                0 => $pdf,
            ],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHas('error', 'Falha no envio dos documentos! O arquivo document.docx não é do tipo pdf!');
        Mail::assertNotSent(\App\Mail\InscricaoConfirmadaEmail::class);

        $this->assertDatabaseMissing('formularios', [
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'historico_escolar',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'comprovante_matricula',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'experiencia_profissional',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'trabalho_voluntario',
        ]);
    }
    //teste de enviar o campo nome em branco
    public function testSendFormWithEmptyNome()
    {
        Mail::fake();

        $pdf = UploadedFile::fake()->create('document.pdf', 4000, 'application/pdf');

        $response = $this->post('/form/store',[
            '_token' => csrf_token(),
            'nome' => '',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua'=> '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'cargo_id' => 1,
            'comprovante_matricula_radio' => [
                0 => '1',
            ],
            'experiencia_profissional_radio' => [
                0 => '1',
            ],
            'trabalho_voluntario_radio' => [
                0 => '1',
            ],
            'historico_escolar' => $pdf,
            'comprovante_matricula' => $pdf,
            'experiencia_profissional' => [
                0 => $pdf,
            ],
            'trabalho_voluntario' => [
                0 => $pdf,
            ],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['nome']);
        Mail::assertNotSent(\App\Mail\InscricaoConfirmadaEmail::class);

        $this->assertDatabaseMissing('formularios', [
            'cpf' => '123.456.789-10',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'historico_escolar',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'comprovante_matricula',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'experiencia_profissional',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'trabalho_voluntario',
        ]);
    }

    public function testSendFormWithEmptyCPF()
    {
        Mail::fake();

        $pdf = UploadedFile::fake()->create('document.pdf', 4000, 'application/pdf');

        $response = $this->post('/form/store',[
            '_token' => csrf_token(),
            'nome' => 'usuario teste',
            'cpf' => '',
            'nome_rua' => 'Rua abc',
            'numero_rua'=> '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'cargo_id' => 1,
            'comprovante_matricula_radio' => [
                0 => '1',
            ],
            'experiencia_profissional_radio' => [
                0 => '1',
            ],
            'trabalho_voluntario_radio' => [
                0 => '1',
            ],
            'historico_escolar' => $pdf,
            'comprovante_matricula' => $pdf,
            'experiencia_profissional' => [
                0 => $pdf,
            ],
            'trabalho_voluntario' => [
                0 => $pdf,
            ],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['cpf']);
        Mail::assertNotSent(\App\Mail\InscricaoConfirmadaEmail::class);

        $this->assertDatabaseMissing('formularios', [
            'nome' => 'usuario teste',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'historico_escolar',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'comprovante_matricula',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'experiencia_profissional',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'trabalho_voluntario',
        ]);
    }
    public function testSendFormWithEmptyNome_Rua()
    {
        Mail::fake();

        $pdf = UploadedFile::fake()->create('document.pdf', 4000, 'application/pdf');

        $response = $this->post('/form/store',[
            '_token' => csrf_token(),
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => '',
            'numero_rua'=> '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'cargo_id' => 1,
            'comprovante_matricula_radio' => [
                0 => '1',
            ],
            'experiencia_profissional_radio' => [
                0 => '1',
            ],
            'trabalho_voluntario_radio' => [
                0 => '1',
            ],
            'historico_escolar' => $pdf,
            'comprovante_matricula' => $pdf,
            'experiencia_profissional' => [
                0 => $pdf,
            ],
            'trabalho_voluntario' => [
                0 => $pdf,
            ],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['nome_rua']);
        Mail::assertNotSent(\App\Mail\InscricaoConfirmadaEmail::class);

        $this->assertDatabaseMissing('formularios', [
            'cpf' => '123.456.789-10',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'historico_escolar',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'comprovante_matricula',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'experiencia_profissional',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'trabalho_voluntario',
        ]);
    }

    public function testSendFormWithEmptyNumero_Rua()
    {
        Mail::fake();

        $pdf = UploadedFile::fake()->create('document.pdf', 4000, 'application/pdf');

        $response = $this->post('/form/store',[
            '_token' => csrf_token(),
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua'=> '',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'cargo_id' => 1,
            'comprovante_matricula_radio' => [
                0 => '1',
            ],
            'experiencia_profissional_radio' => [
                0 => '1',
            ],
            'trabalho_voluntario_radio' => [
                0 => '1',
            ],
            'historico_escolar' => $pdf,
            'comprovante_matricula' => $pdf,
            'experiencia_profissional' => [
                0 => $pdf,
            ],
            'trabalho_voluntario' => [
                0 => $pdf,
            ],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['numero_rua']);
        Mail::assertNotSent(\App\Mail\InscricaoConfirmadaEmail::class);

        $this->assertDatabaseMissing('formularios', [
            'cpf' => '123.456.789-10',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'historico_escolar',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'comprovante_matricula',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'experiencia_profissional',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'trabalho_voluntario',
        ]);
    }

    public function testSendFormWithEmptyEmail()
    {
        Mail::fake();

        $pdf = UploadedFile::fake()->create('document.pdf', 4000, 'application/pdf');

        $response = $this->post('/form/store',[
            '_token' => csrf_token(),
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua'=> '123',
            'email' => '',
            'telefone_1' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'cargo_id' => 1,
            'comprovante_matricula_radio' => [
                0 => '1',
            ],
            'experiencia_profissional_radio' => [
                0 => '1',
            ],
            'trabalho_voluntario_radio' => [
                0 => '1',
            ],
            'historico_escolar' => $pdf,
            'comprovante_matricula' => $pdf,
            'experiencia_profissional' => [
                0 => $pdf,
            ],
            'trabalho_voluntario' => [
                0 => $pdf,
            ],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['email']);
        Mail::assertNotSent(\App\Mail\InscricaoConfirmadaEmail::class);

        $this->assertDatabaseMissing('formularios', [
            'cpf' => '123.456.789-10',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'historico_escolar',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'comprovante_matricula',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'experiencia_profissional',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'trabalho_voluntario',
        ]);
    }

    public function testSendFormWithEmptyTelefone_1()
    {
        Mail::fake();

        $pdf = UploadedFile::fake()->create('document.pdf', 4000, 'application/pdf');

        $response = $this->post('/form/store',[
            '_token' => csrf_token(),
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua'=> '123',
            'email' => 'test@test.com',
            'telefone_1' => '',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'cargo_id' => 1,
            'comprovante_matricula_radio' => [
                0 => '1',
            ],
            'experiencia_profissional_radio' => [
                0 => '1',
            ],
            'trabalho_voluntario_radio' => [
                0 => '1',
            ],
            'historico_escolar' => $pdf,
            'comprovante_matricula' => $pdf,
            'experiencia_profissional' => [
                0 => $pdf,
            ],
            'trabalho_voluntario' => [
                0 => $pdf,
            ],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['telefone_1']);
        Mail::assertNotSent(\App\Mail\InscricaoConfirmadaEmail::class);

        $this->assertDatabaseMissing('formularios', [
            'cpf' => '123.456.789-10',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'historico_escolar',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'comprovante_matricula',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'experiencia_profissional',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'trabalho_voluntario',
        ]);
    }

    public function testSendFormWithEmptyCurriculo_lattes()
    {
        Mail::fake();

        $pdf = UploadedFile::fake()->create('document.pdf', 4000, 'application/pdf');

        $response = $this->post('/form/store',[
            '_token' => csrf_token(),
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua'=> '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'curriculo_lattes' => '',
            'cargo_id' => 1,
            'comprovante_matricula_radio' => [
                0 => '1',
            ],
            'experiencia_profissional_radio' => [
                0 => '1',
            ],
            'trabalho_voluntario_radio' => [
                0 => '1',
            ],
            'historico_escolar' => $pdf,
            'comprovante_matricula' => $pdf,
            'experiencia_profissional' => [
                0 => $pdf,
            ],
            'trabalho_voluntario' => [
                0 => $pdf,
            ],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['curriculo_lattes']);
        Mail::assertNotSent(\App\Mail\InscricaoConfirmadaEmail::class);

        $this->assertDatabaseMissing('formularios', [
            'cpf' => '123.456.789-10',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'historico_escolar',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'comprovante_matricula',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'experiencia_profissional',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'trabalho_voluntario',
        ]);
    }

    public function testSendFormWithEmptyCargo_id()
    {
        Mail::fake();

        $pdf = UploadedFile::fake()->create('document.pdf', 4000, 'application/pdf');

        $response = $this->post('/form/store',[
            '_token' => csrf_token(),
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua'=> '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'cargo_id' => '',
            'comprovante_matricula_radio' => [
                0 => '1',
            ],
            'experiencia_profissional_radio' => [
                0 => '1',
            ],
            'trabalho_voluntario_radio' => [
                0 => '1',
            ],
            'historico_escolar' => $pdf,
            'comprovante_matricula' => $pdf,
            'experiencia_profissional' => [
                0 => $pdf,
            ],
            'trabalho_voluntario' => [
                0 => $pdf,
            ],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['cargo_id']);
        Mail::assertNotSent(\App\Mail\InscricaoConfirmadaEmail::class);

        $this->assertDatabaseMissing('formularios', [
            'cpf' => '123.456.789-10',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'historico_escolar',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'comprovante_matricula',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'experiencia_profissional',
        ]);

        $this->assertDatabaseMissing('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'trabalho_voluntario',
        ]);
    }

    public function testSubmitFormWithOptionalEmptyCargo_idField()
    {
        //testa o envio do formulário com o campo cargo_id vazio, mas como o campo é opcional, o formulário deve ser enviado
        Mail::fake();

        $pdf = UploadedFile::fake()->create('document.pdf', 4000, 'application/pdf');

        $response = $this->post('/form/store', [
            '_token' => csrf_token(),
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua' => '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'telefone_2' => null,
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'cargo_id' => '1',
            'comprovante_matricula_radio' => [
                0 => '1',
            ],
            'experiencia_profissional_radio' => [
                0 => '1',
            ],
            'trabalho_voluntario_radio' => [
                0 => '1',
            ],
            'historico_escolar' => $pdf,
            'comprovante_matricula' => $pdf,
            'experiencia_profissional' => [
                0 => $pdf,
            ],
            'trabalho_voluntario' => [
                0 => $pdf,
            ],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Inscrição realizada com sucesso!');
        Mail::assertSent(\App\Mail\InscricaoConfirmadaEmail::class);

        $this->assertDatabaseHas('formularios', [
            'nome' => 'usuario teste',
            'cpf' => '123.456.789-10',
            'nome_rua' => 'Rua abc',
            'numero_rua' => '123',
            'email' => 'test@test.com',
            'telefone_1' => '(12) 93456-7890',
            'telefone_2' => null,
            'curriculo_lattes' => 'http://lattes.cnpq.br/123456789',
            'codigo_validacao' => false,
            'cargo_id' => 1,
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'historico_escolar',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'comprovante_matricula',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'experiencia_profissional',
        ]);

        $this->assertDatabaseHas('anexos', [
            'formulario_id' => 1,
            'cargo_id' => 1,
            'label' => 'trabalho_voluntario',
        ]);
    }
}