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
        Schema::create('lote_vacinas', function (Blueprint $table): void {
            $table->ulid('id')->primary()->unique()->index();
            $table->foreignId('id_tipo_vacina')->constrained('tipo_vacinas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('lote', 10);
            $table->dateTimeTz('data_validade');
            $table->boolean('dose_unica');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lote_vacinas');
    }
};
