<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;
    protected $table = 'promociones'; // Nombre de la tabla
    protected $primaryKey = 'codigo'; // Llave primaria de la tabla
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['nombre', 'descripcion', 'id_plato', 'descuento', 'fecha_inicio', 'fecha_fin', 'estado']; // Campos para asignación masiva
}
