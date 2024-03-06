<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tipo_marca extends Model
{
    use HasFactory;

    protected $table = 'tipo_marca';
    protected $primaryKey = 'id_tipo';
    public $incrementing = false;
    public $timestamps = false;
}