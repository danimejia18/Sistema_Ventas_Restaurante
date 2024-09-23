<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array([
            'nombre'=>'Menú del día', 
            'id_plato'=> 1,
            'id_categoria'=> 2,
            'created_at'=>Carbon::now()
        ],[
            'nombre'=>'Menú familiar', 
            'id_plato'=> 2,
            'id_categoria'=> 1,
            'created_at'=>Carbon::now()
        ]);

        //Insertamos la data en la tabla menus
        DB::table('menus')->insert($data);
    }
}
