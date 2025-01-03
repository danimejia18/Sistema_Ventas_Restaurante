<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'empleados';
    protected $primaryKey = 'codigo';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['nombre', 'apellido', 'correo', 'telefono', 'rol', 'password','id_acceso']; // Asegúrate de incluir los campos necesarios

    // Definir la relación con el modelo Acceso
    public function acceso()
    {
        return $this->belongsTo(Acceso::class, 'id_acceso', 'codigo'); // Asegúrate de que 'codigo' sea la clave primaria en la tabla 'accesos'
    }

    public function getRolDescripcionAttribute()
{
    switch ($this->rol) {
        case 1:
            return 'Mesero';
        case 2:
            return 'Cocinero';
        case 3:
            return 'Gerente';
        case 4:
            return 'Personal de Limpieza';
        default:
            return 'Rol no definido';
    }
}


}
