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
            $table->ulid('funcionario_cpf');
            $table->foreignId('comorbidade_id')->constrained('comorbidades')->cascadeOnDelete()->cascadeOnUpdate();

            $table->unique(['funcionario_cpf', 'comorbidade_id']);
            $table->foreign('funcionario_cpf')->references('cpf')->on('funcionarios')->cascadeOnDelete()->cascadeOnUpdate();
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
