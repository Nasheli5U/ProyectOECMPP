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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id('ID_expediente');
            $table->string('numero')->unique();
            $table->unsignedBigInteger('ID_persona'); // Foreign key como unsignedBigInteger
            $table->string('direccion_predio');
            $table->foreign('ID_persona')->references('ID_persona')->on('personas')->onDelete('cascade'); // Clave foránea
            $table->unsignedBigInteger('ID_procedencia');
            $table->foreign('ID_procedencia')->references('ID_procedencia')->on('procedencias')->onDelete('cascade');
            $table->date('fecha_entrada');
            $table->date('fecha_notificacion')->nullable();
            $table->unsignedBigInteger('ID_infraccion');
            $table->foreign('ID_infraccion')->references('ID_infraccion')->on('infracciones')->onDelete('cascade');
            $table->string('estado');
            $table->text('medida_complementaria')->nullable();
            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
