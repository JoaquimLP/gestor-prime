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
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->string('nome')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->string('cpf', 20)->nullable();
            $table->string('rg', 20)->nullable();
            $table->string('crm')->nullable();
            $table->string('rqe')->nullable();
            $table->integer('func_public')->default(0);
            $table->enum("estado_civil", ["C", "S", "D", "V", "N"])->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('logradouro', 250)->nullable();
            $table->string('bairro_desc', 100)->nullable();
            $table->string('cidade_desc', 70)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->enum('ativo', ['S', 'N'])->default("S");
            $table->date("data")->nullable();
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicos');
    }
};
