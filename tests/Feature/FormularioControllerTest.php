<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class FormularioControllerTest extends TestCase
{

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
}