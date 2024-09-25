<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedencia extends Model
{
    protected $table = 'procedencias';
    protected $primaryKey = 'ID_procedencia';
    public $timestamps = false; // Si no tienes created_at y updated_at
    protected $fillable = ['nombre'];

    public function expedientes()
    {
        return $this->hasMany(Expediente::class, 'ID_procedencia');
    }
}
