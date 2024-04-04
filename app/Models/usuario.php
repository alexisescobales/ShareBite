<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;
    protected $fillable = [
        'nombre', 'password', 'correo', 'foto', 'tipo_usuario_id_tipo'
    ];

    public function tipo_usuario(): BelongsTo
    {
        return $this->belongsTo(Tipo_usuario::class);
    }

    public function tiendas(): HasMany
    {
        return $this->hasMany(Tiendas::class);
    }

    public function marcas(): HasMany
    {
        return $this->hasMany(Marcas::class);
    }

    public function raider(): HasMany
    {
        return $this->hasMany(Raider::class);
    }
}