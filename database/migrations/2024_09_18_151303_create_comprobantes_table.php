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
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->id('ID_comprobante');
            $table->unsignedBigInteger('ID_expediente'); // Clave foránea como unsignedBigInteger
            $table->string('numero_recibo')->unique();
            $table->date('fecha');
            $table->decimal('total', 8, 2);
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
        Schema::dropIfExists('comprobantes');
    }
};
