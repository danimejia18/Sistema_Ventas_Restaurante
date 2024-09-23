<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array([
            'id_cliente'=> 1,
            'id_empleado'=>1,
            'fecha'=>now(),
            'total'=>20.00,
            'estado'=>'pendiente',
            'created_at'=>Carbon::now()
        ],[
            'id_cliente'=> 2,
            'id_empleado'=>2,
            'fecha'=>now(),
            'total'=>30.00,
            'estado'=>'pendiente',
            'created_at'=>Carbon::now()
        ]);

        //Insertamos la data en la tabla pedidos
        DB::table('pedidos')->insert($data);
    }
}
