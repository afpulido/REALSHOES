<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pedido_compra extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'metodo_pagos_id',
        'empleado_productos_id',
        'cantidad',
        'valor_total',
        'created_at',
        'updated_at',
        'deleted_at'
    ];



}
