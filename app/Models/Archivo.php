<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    // Define los campos que se pueden llenar masivamente
    protected $fillable = [
        'ID_expediente',
        'nombre_archivo',
        'tipo_archivo',
    ];

    // Define la tabla que se usará para este modelo
    protected $table = 'archivos';

    // Define la clave primaria de la tabla
    protected $primaryKey = 'ID_archivo';

    // Indica que la clave primaria no es autoincremental
    public $incrementing = true;

    // Define si el modelo debe manejar timestamps
    public $timestamps = true;


    public function expediente()
    {
        return $this->belongsTo(Expediente::class, 'ID_expediente');
    }
}
