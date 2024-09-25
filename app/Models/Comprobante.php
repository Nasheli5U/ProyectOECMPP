<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_comprobante';
    protected $fillable = [
        'ID_expediente', 
        'numero_recibo', 
        'fecha', 
        'total'
    ];

    public function expediente()
    {
        return $this->belongsTo(Expediente::class, 'ID_expediente');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleComprobantePago::class, 'ID_comprobante');
    }
}
