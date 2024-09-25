<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ReservacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array([
            'id_cliente'=> 1,
            'id_mesa'=> 1,
            'fecha_hora'=> now()->addHours(3),
            'estado'=>'Confirmada',
            'created_at'=>Carbon::now()
        ],[
            'id_cliente'=> 2,
            'id_mesa'=> 3,
            'fecha_hora'=> now()->addHours(3),
            'estado'=>'Confirmada',
            'created_at'=>Carbon::now()
        ]);
        //Insertamos la data en la tabla reservaciones
        DB::table('reservaciones')->insert($data);
    }
}
