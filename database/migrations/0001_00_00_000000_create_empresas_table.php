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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->string('nome', 150)->nullable();
            $table->string('razao_social', 150)->nullable();
            $table->string('celular', 20)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('cnpj', 20)->nullable();
            $table->string('ie', 20)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('logradouro', 250)->nullable();
            $table->string('bairro_desc', 100)->nullable();
            $table->string('cidade_desc', 70)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento', 70)->nullable();
            $table->string('logo', 350)->nullable();
            $table->enum('ativo', ['S', 'N'])->default("S");
            $table->enum('tipo_empresa', ['M', 'F'])->default("F");
            $table->string('token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
