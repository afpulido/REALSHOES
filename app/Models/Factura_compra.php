<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factura_compra extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'pedido_compras_id',
        'descuento',
        'impuesto',
        'created_at',
        'updated_at',
        'deleted_at'
    ];



}
