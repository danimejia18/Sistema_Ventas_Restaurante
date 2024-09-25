<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array([
            'id_pedido'=> 1,
            'monto'=> 20.00,
            'metodo'=> 'Efectivo',
            'fecha'=>now(),
            'estado'=>'Pagado',
            'created_at'=>Carbon::now()
        ],[
            'id_pedido'=> 2,
            'monto'=> 30.00,
            'metodo'=> 'Efectivo',
            'fecha'=>now(),
            'estado'=>'Pagado',
            'created_at'=>Carbon::now()
        ]);

        //Insertamos la data en la tabla pagos
        DB::table('pagos')->insert($data);
    }
}
