<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infraccion extends Model
{
    protected $table = 'infracciones';  // La tabla se llama 'infracciones'
    protected $primaryKey = 'ID_infraccion'; // Clave primaria personalizada
    public $timestamps = false;  // Si no tienes created_at y updated_at
    protected $fillable = ['codigo', 'descripcion', 'monto'];  // Campos que se pueden asignar masivamente

    public function expedientes()
    {
        return $this->hasMany(Expediente::class, 'ID_infraccion');
    }

}
