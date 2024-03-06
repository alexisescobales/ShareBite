<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class raider extends Model
{
    use HasFactory;

    protected $table = 'raider';
    protected $primaryKey = 'id_raider_id_usuario';
    public $incrementing = false;
    public $timestamps = false;
}