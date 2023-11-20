<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    protected $charset = 'utf8mb4';
    protected $collation = 'utf8mb4_unicode_ci';
    protected $table = 'provincias';
    protected $primaryKey = 'codigo';
    protected $fillable = ['detalle'];

    // Indica si la clave primaria es un número autoincrementable
    public $incrementing = true;
    // Desactivar marcas de tiempo
    public $timestamps = false;
    // Indica el tipo de datos de la clave primaria
    protected $keyType = 'int';
}

