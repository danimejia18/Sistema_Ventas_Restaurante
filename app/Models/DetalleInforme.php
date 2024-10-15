<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleInforme extends Model
{
    use HasFactory;
    protected $table = 'detalle_informes'; // Nombre de la tabla
    protected $primaryKey = 'codigo'; // Llave primaria de la tabla
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['id_informe', 'id_pedido', 'id_cliente', 'id_empleado', 'id_pago', 'id_reservacion', 'id_mesa', 'id_promocion']; // Campos para asignación masiva
}
