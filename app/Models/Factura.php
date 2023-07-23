<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factura extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'pedidos_id',
        'desuento',
        'impuesto',
        'created_at',
        'updated_at',
        'deleted_at'
    ];


}
