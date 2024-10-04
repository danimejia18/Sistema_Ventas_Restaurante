<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
    use HasFactory;
    protected $table = 'accesos'; // Nombre de la tabla
    protected $primaryKey = 'codigo'; // Llave primaria de la tabla
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['tipo_acceso', 'descripcion']; // Campos para asignación masiva
}
