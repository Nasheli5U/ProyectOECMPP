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
        Schema::create('archivos', function (Blueprint $table) {
            $table->id('ID_archivo');
            $table->unsignedBigInteger('ID_expediente'); // Foreign key como unsignedBigInteger
            $table->string('nombre_archivo');
            $table->string('tipo_archivo');
            $table->timestamps();
        
            // Definir la clave foránea correctamente
            $table->foreign('ID_expediente')->references('ID_expediente')->on('expedientes')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
    }
};
