<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleComprobantePago extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_detalle_comprobante_pago';
    protected $fillable = [
        'ID_comprobante', 
        'ID_pago', 
        'monto_pago'
    ];

    public function comprobante()
    {
        return $this->belongsTo(Comprobante::class, 'ID_comprobante');
    }

    public function pago()
    {
        return $this->belongsTo(Pago::class, 'ID_pago');
    }

    
}
