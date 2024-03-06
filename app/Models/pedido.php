<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido';
    protected $primaryKey = 'id_pedido';
    public $incrementing = false;
    public $timestamps = false;
}