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
        Schema::create('detalle_comprobante_pagos', function (Blueprint $table) {
            $table->id('ID_detalle_comprobante_pago');
            $table->unsignedBigInteger('ID_comprobante'); // Clave foránea como unsignedBigInteger
            $table->unsignedBigInteger('ID_pago'); // Clave foránea
            $table->decimal('monto_pago', 8, 2);
            $table->timestamps();
        
            // Claves foráneas
            $table->foreign('ID_comprobante')->references('ID_comprobante')->on('comprobantes')->onDelete('cascade');
            $table->foreign('ID_pago')->references('ID_pago')->on('pagos')->onDelete('cascade');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_comprobante_pagos');
    }
};
