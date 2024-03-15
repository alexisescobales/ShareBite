<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Raider extends Model
{
    use HasFactory;

    protected $table = 'raider';
    protected $primaryKey = 'id_raider_id_usuario';
    public $incrementing = false;
    public $timestamps = false;

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function favoritos(): HasMany
    {
        return $this->hasMany(favoritos::class);
    }

    public function pedido(): HasMany
    {
        return $this->hasMany(pedido::class);
    }
}