<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Marca extends Model
{
    protected $table = 'tipo_marca'; // Nombre de la tabla en la base de datos
    protected $fillable = ['id_tipo_marca', 'nombre_marca'];

    // Relación con la tabla marcas
    public function marcas()
    {
        return $this->hasMany(Marca::class, 'tipo_marca_id_tipo_marca', 'id');
    }
}