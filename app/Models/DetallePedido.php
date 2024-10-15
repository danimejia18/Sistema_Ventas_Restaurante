<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;
    protected $table = 'detalle_pedidos'; // Nombre de la tabla
    protected $primaryKey = 'codigo'; // Llave primaria de la tabla
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['id_pedido', 'id_producto', 'cantidad', 'precio_unitario', 'subtotal']; // Campos para asignación masiva
}
