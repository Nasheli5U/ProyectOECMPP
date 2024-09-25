<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $primaryKey = 'ID_persona'; // Define la clave primaria correcta

    public $incrementing = true; // Si la clave es auto-incremental (mantén en true si es el caso)

    protected $keyType = 'int'; // Si la clave primaria es de tipo entero

    protected $fillable = [
        'nombre',
        'apellido',
        'DNI',
        'RUC',
        'domicilio_fiscal',
    ];

    public function expedientes()
    {
        return $this->hasMany(Expediente::class, 'ID_persona'); // Relación con expedientes
    }
}
