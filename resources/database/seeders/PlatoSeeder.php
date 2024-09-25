<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array([
            'nombre'=> 'Pizza',
            'precio'=> 5.00,
            'ingredientes'=> 'Masa, Queso, Peperoni',
            'id_categoria'=> 3,
            'created_at'=>Carbon::now()
        ],[
            'nombre'=> 'Tacos',
            'precio'=> 8.00,
            'ingredientes'=> 'Torilla, Carne, Chirimol, Queso',
            'id_categoria'=> 3,
            'created_at'=>Carbon::now()
        ]);

        //Insertamos la data en la tabla platos
        DB::table('platos')->insert($data);
    }
}
