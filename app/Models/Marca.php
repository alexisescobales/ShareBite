<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas'; // Nombre de la tabla en la base de datos
    protected $fillable = ['long', 'lat', 'tipo_marca_id_tipo_marca', 'usuario_id_usuario', 'estado'];
}