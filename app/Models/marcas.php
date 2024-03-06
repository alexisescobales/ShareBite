<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class marcas extends Model
{
    use HasFactory;

    protected $table = 'marcas';
    protected $primaryKey = 'id_marcas';
    public $incrementing = false;
    public $timestamps = false;
}