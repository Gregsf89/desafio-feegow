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
            $table->string('cpf_funcionario', 11);
            $table->ulid('id_lote_vacina');
            $table->dateTimeTz('data_aplicacao');
            $table->timestampsTz();

            $table->index(['cpf_funcionario', 'id_lote_vacina'], 'dose_vacinas_cpf_funcionario_id_lote_vacina_index');
            $table->foreign('cpf_funcionario')->references('cpf')->on('funcionarios')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_lote_vacina')->references('id')->on('lote_vacinas')->cascadeOnDelete()->cascadeOnUpdate();
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
