<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DetallePedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array([
            'id_pedido'=> 1,
            'id_producto'=> 1,
            'cantidad'=> 2,
            'precio_unitario'=>1.50,
            'subtotal'=>3.00,
            'created_at'=>Carbon::now()
        ],[
            'id_pedido'=> 2,
            'id_producto'=> 2,
            'cantidad'=> 2,
            'precio_unitario'=>1.00,
            'subtotal'=>2.00,
            'created_at'=>Carbon::now()
        ]);

        //Insertamos la data en la tabla informes
        DB::table('detalle_pedidos')->insert($data);
    }
}
