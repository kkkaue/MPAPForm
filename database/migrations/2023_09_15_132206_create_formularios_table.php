<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->string('cpf');
            $table->string('genero');
            $table->string('nome_rua');
            $table->integer('numero_rua');
            $table->string('email');
            $table->string('telefone_1');
            $table->string('telefone_2')->nullable();
            $table->string('curriculo_lattes');
            $table->boolean('possui-deficiencia')->default(false);
            $table->boolean('fisica-motora')->nullable()->default(false);
            $table->boolean('auditiva')->nullable()->default(false);
            $table->boolean('visual')->nullable()->default(false);
            $table->boolean('neurodivergencia')->nullable()->default(false);
            $table->string('codigo')->nullable();
            $table->boolean('codigo_validacao')->nullable()->default(false);
            $table->unsignedBigInteger('cargo_id');
            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formularios');
    }
};
