<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marcas extends Model
{
    use HasFactory;

    protected $table = 'marcas';
    protected $primaryKey = 'id_marcas';
    public $incrementing = false;
    public $timestamps = false;

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function tipo_marca(): BelongsTo
    {
        return $this->belongsTo(Tipo_marca::class);
    }

    public function pedido(){

        return $this->belongsToMany(Pedido::class, 'marcas_has_pedido', 'marcas_id_marcas', 'pedido_id_pedido')->withPivot('cantidad_menus');

    }

}