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
        Schema::create('especialidades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->enum('ativo', ['S', 'N'])->default("S");
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas');
        });

        Schema::create('especialidade_medicos', function (Blueprint $table) {
            $table->unsignedBigInteger('medico_id')->nullable();
            $table->unsignedBigInteger('especialidade_id')->nullable();

            $table->foreign('medico_id')->references('id')->on('medicos');
            $table->foreign('especialidade_id')->references('id')->on('especialidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especialidade_medicos');
        Schema::dropIfExists('especialidades');
    }
};
