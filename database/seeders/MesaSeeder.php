<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class MesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array([
            'numero'=> 1,
            'capacidad'=> 4,
            'estado'=> 'Disponible',
            'created_at'=>Carbon::now()
        ],[
            'numero'=> 2,
            'capacidad'=> 2,
            'estado'=> 'No disponible',
            'created_at'=>Carbon::now()
        ],[
            'numero'=> 3,
            'capacidad'=> 2,
            'estado'=>'Disponible',
            'created_at'=>Carbon::now()
        ]);

        //Insertamos la data en la tabla mesas
        DB::table('mesas')->insert($data);
    }
}
