<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class puntos_entrega extends Model
{
    protected $table = 'puntos_entrega'; // Nombre de la tabla

    protected $fillable = ['nombre_punto_entrega', 'coordenadas']; // Campos que puedes llenar

    // Otras relaciones o métodos si los necesitas
}
