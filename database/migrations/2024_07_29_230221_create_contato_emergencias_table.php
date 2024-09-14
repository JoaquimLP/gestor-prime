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
        Schema::create('contato_emergencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medico_id')->nullable();
            $table->string('nome')->nullable();
            $table->enum('tipo', ["E", "T", "O"])->default("T");
            $table->string("contato")->nullable();
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
        Schema::dropIfExists('contato_emergencias');
    }
};
