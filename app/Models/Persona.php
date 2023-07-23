<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'personas_id',
        'name',
        'apellidos',
        'direccion',
        'telefono',
        'tipo_doc_id',
        'rol_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];



}
