<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array([
            'nombre'=>'Bebidas', 
            'descripcion'=>'Bebidas frias',
            'created_at'=>Carbon::now()
        ],[
            'nombre'=>'Bebidas', 
            'descripcion'=>'Bebidas calientes',
            'created_at'=>Carbon::now()
        ],[
            'nombre'=>'Comida', 
            'descripcion'=>'Platos Principales',
            'created_at'=>Carbon::now()
        ],[
            'nombre'=>'Comida', 
            'descripcion'=>'Acompañamiento',
            'created_at'=>Carbon::now()
        ]);

        //Insertamos la data en la tabla categorias
        DB::table('categorias')->insert($data);
    }
}
