<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido';
    protected $primaryKey = 'id_pedido';
    public $incrementing = false;
    public $timestamps = false;

    public function tiendas(): BelongsTo
    {
        return $this->belongsTo(tiendas::class);
    }

    public function raider(): BelongsTo
    {
        return $this->belongsTo(raider::class);
    }

    public function marcas_has_pedido(): HasMany
    {
        return $this->hasMany(marcas_has_pedido::class);
    }
}