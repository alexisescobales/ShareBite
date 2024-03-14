<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tipo_usuario extends Model
{
    use HasFactory;

    protected $table = 'tipo_usuario';
    protected $primaryKey = 'id_tipo';
    public $incrementing = false;
    public $timestamps = false;

    public function usuario(): HasMany
    {
        return $this->hasMany(usuario::class);
    }
}