<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array([
            'nombre'=> 'Gaseosa',
            'descripcion'=> 'Bebida gaseosa',
            'stock'=> 100,
            'estado'=> 'Existente',
            'created_at'=>Carbon::now()
        ],[
            'nombre'=> 'Jugo',
            'descripcion'=> 'Bebida fria ',
            'stock'=> 95,
            'estado'=>'Existente',
            'created_at'=>Carbon::now()
        ]);

        //Insertamos la data en la tabla productos
        DB::table('productos')->insert($data);
    }
}
