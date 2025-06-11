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
        Schema::create('valor__historico__juses', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_desde');
            $table->decimal('valor_JUS', 9,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valor__historico__juses');
    }
};
