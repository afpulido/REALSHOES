<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contenido_inventario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'productos_id',
        'stock',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

}
