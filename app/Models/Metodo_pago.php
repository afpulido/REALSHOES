<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Metodo_pago extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'tipo_pago',
        'descripción',
        'created_at',
        'updated_at',
        'deleted_at'
    ];


}
