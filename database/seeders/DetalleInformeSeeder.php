<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DetalleInformeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array([
            'id_informe'=> 1,
            'id_pedido'=> 1,
            'id_cliente'=> 1,
            'id_empleado'=> 1,
            'id_pago'=> 1,
            'id_reservacion'=> 1,
            'id_mesa'=> 1,
            'id_promocion'=> 1,
            'created_at'=>Carbon::now()
        ], [
            'id_informe'=> 2,
            'id_pedido'=> 2,
            'id_cliente'=> 2,
            'id_empleado'=> 2,
            'id_pago'=> 2,
            'id_reservacion'=> 2,
            'id_mesa'=> 2,
            'id_promocion'=> 2,
            'created_at'=>Carbon::now()
        ]);

        //Insertamos la data en la tabla informes
        DB::table('detalle_informes')->insert($data);
    }
}
