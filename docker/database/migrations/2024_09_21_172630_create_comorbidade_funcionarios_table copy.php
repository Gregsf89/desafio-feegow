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
        Schema::create('comorbidade_funcionarios', function (Blueprint $table): void {
            $table->ulid('cpf_funcionario');
            $table->foreignId('id_comorbidade')->constrained('comorbidades')->cascadeOnDelete()->cascadeOnUpdate();

            $table->index(['cpf_funcionario', 'id_comorbidade'], 'comorbidade_funcionarios_cpf_funcionario_id_comorbidade_index');
            $table->foreign('cpf_funcionario')->references('cpf')->on('funcionarios')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comorbidades');
    }
};
