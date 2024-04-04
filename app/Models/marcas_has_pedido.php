<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class marcas_has_pedido extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = ['marcas_id_marcas', 'pedido_id_pedido'];
    public $timestamps = false;

    public function marcas(): BelongsTo
    {
        return $this->belongsTo(Marcas::class);
    }

    public function pedido(): BelongsTo
    {
        return $this->belongsTo(pedido::class);
    }
}