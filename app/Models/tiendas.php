<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tiendas extends Model
{
    use HasFactory;

    protected $table = 'tiendas';
    protected $primaryKey = 'tienda_id_usuario';
    public $incrementing = false;
    public $timestamps = false;
}