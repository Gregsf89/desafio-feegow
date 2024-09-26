<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dose_vacinas', function (Blueprint $table): void {
            $table->string('funcionario_cpf', 11);
            $table->ulid('lote_vacina_id');
            $table->enum('dose', ['1', '2', '3']);
            $table->dateTimeTz('data_aplicacao');
            $table->timestampsTz();

            $table->unique(['funcionario_cpf', 'dose', 'lote_vacina_id']);
            $table->foreign('funcionario_cpf')->references('cpf')->on('funcionarios')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('lote_vacina_id')->references('id')->on('lote_vacinas')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dose_vacinas');
    }
};
