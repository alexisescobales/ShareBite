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
        return $this->belongsTo(Tiendas::class);
    }

    public function raider(): BelongsTo
    {
        return $this->belongsTo(Raider::class);
    }

    public function marcas(){

        return $this->belongsToMany(Pedido::class, 'marcas_has_pedido', 'pedido_id_pedido', 'marcas_id_marcas')->withPivot('cantidad_menus');

    }
}