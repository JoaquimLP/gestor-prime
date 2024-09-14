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
        Schema::create('unidade_atendimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->string('nome')->nullable();
            $table->string('description')->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('logradouro', 250)->nullable();
            $table->string('bairro_desc', 100)->nullable();
            $table->string('cidade_desc', 70)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->enum('ativo', ['S', 'N'])->default("S");
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas');
        });

        Schema::create('unidade_atendimentos_medicos', function (Blueprint $table) {
            $table->unsignedBigInteger('medico_id')->nullable();
            $table->unsignedBigInteger('unidade_atendimento_id')->nullable();

            $table->foreign('medico_id')->references('id')->on('medicos');
            $table->foreign('unidade_atendimento_id')->references('id')->on('unidade_atendimentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidade_atendimentos_medicos');
        Schema::dropIfExists('unidade_atendimentos');
    }
};
