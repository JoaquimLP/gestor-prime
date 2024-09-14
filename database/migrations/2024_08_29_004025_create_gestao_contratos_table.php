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
        Schema::create('gestao_contratos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->string('contratada')->nullable();
            $table->string('cidade_desc', 70)->nullable();
            $table->string('uf', 2)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->double("valor_hora", 10, 2)->nullable();
            $table->double("valor_total", 10, 2)->nullable();
            $table->integer("qtd_especialista")->nullable();
            $table->enum('ativo', ['S', 'N'])->default("S");
            $table->string('path', 350)->nullable();
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas');
        });

        Schema::create('gestao_contrato_unidades', function (Blueprint $table) {
            $table->unsignedBigInteger('gestao_contrato_id')->nullable();
            $table->unsignedBigInteger('unidade_atendimento_id')->nullable();

            $table->foreign('gestao_contrato_id')->references('id')->on('gestao_contratos');
            $table->foreign('unidade_atendimento_id')->references('id')->on('unidade_atendimentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestao_contrato_unidades');
        Schema::dropIfExists('gestao_contratos');
    }
};
