<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_pago';
    protected $fillable = [
        'procedimiento', 
        'monto'
    ];

    public function detalles()
    {
        return $this->hasMany(DetalleComprobantePago::class, 'ID_pago');
    }
}
