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
        Schema::create('casos_judiciales', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_hora_creacion');
            $table->boolean('estado_caso');
            $table->decimal('caso_total', 9,2);
            $table->dateTime('fecha_hora_fin');
            $table->integer('cant_total_JUS');
            $table->boolean('estado_pago');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casos_judiciales');
    }
};
