<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'tipo',
        'marca',
        'coleccion',
        'genero',
        'talla',
        'valor_compra',
        'valor_enta',
        'created_at',
        'updated_at',
        'deleted_at'
    ];


}
