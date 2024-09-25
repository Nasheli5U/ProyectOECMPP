<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $table = 'expedientes';
    protected $primaryKey = 'ID_expediente';

    protected $fillable = [
        'numero',
        'ID_persona',
        'direccion_predio',
        'ID_procedencia',
        'fecha_entrada',
        'fecha_notificacion',
        'ID_infraccion',
        'estado',
        'medida_complementaria'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'ID_persona');
    }

    public function procedencia()
    {
        return $this->belongsTo(Procedencia::class, 'ID_procedencia');
    }

    public function infraccion()
    {
        return $this->belongsTo(Infraccion::class, 'ID_infraccion');
    }

    public function archivos()
    {
        return $this->hasMany(Archivo::class, 'ID_expediente');
    }

    public function comprobantes()
    {
        return $this->hasMany(Comprobante::class, 'ID_expediente');
    }

   
}
