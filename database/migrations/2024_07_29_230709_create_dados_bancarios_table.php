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
        Schema::create('dados_bancarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medico_id')->nullable();
            $table->string('nome')->nullable();
            $table->string('agencia')->nullable();
            $table->string('tipo_conta')->nullable();
            $table->string('conta')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('pix')->nullable();
            $table->enum('ativo', ['S', 'N'])->default("S");
            $table->timestamps();

            $table->foreign('medico_id')->references('id')->on('medicos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dados_bancarios');
    }
};
