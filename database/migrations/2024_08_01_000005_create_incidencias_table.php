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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->foreignId('estado_id')->constrained('estado_incidencias');
            $table->foreignId('prioridad_id')->constrained('prioridad_incidencias');
            $table->foreignId('categoria_id')->constrained('categoria_incidencias');
            $table->foreignId('creado_por')->constrained('users');
            $table->foreignId('asignado_a')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencias');
    }
};
