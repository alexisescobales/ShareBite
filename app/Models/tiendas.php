<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tiendas extends Model
{
    use HasFactory;

    protected $table = 'tiendas';
    protected $primaryKey = 'tienda_id_usuario';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'tienda_id_usuario', 'estado', 'menus', 'direccion'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function favoritos(): HasMany
    {
        return $this->hasMany(favoritos::class);
    }

    public function pedido(): HasMany
    {
        return $this->hasMany(pedido::class);
    }

    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marcas::class, 'id_marca');
    }
}