<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;

    // Define el nombre de la tabla, si no sigue la convención de plural
    protected $table = 'informes';
    protected $primaryKey = 'codigo'; // Llave primaria de la tabla
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['titulo', 'descripcion', 'fecha_creacion', 'estado'];

    // Relación con el modelo DetalleInforme
    public function detalles()
    {
        return $this->hasMany(DetalleInforme::class, 'informe_id');
    }
}
