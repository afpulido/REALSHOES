<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Persona_producto extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'personas_id',
        'productos_id',
        'estado',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

}
