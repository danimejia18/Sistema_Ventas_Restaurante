<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class InformeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array([
            'fecha_hora'=>now(),
            'usuario_activo'=>'admin',
            'empresa'=>'Restaurante XYZ',
            'rangos_fecha'=>'Esta semana',
            'created_at'=>Carbon::now()
        ],[
            'fecha_hora'=>now(),
            'usuario_activo'=>'usuario',
            'empresa'=>'Restaurante WXY',
            'rangos_fecha'=>'Esta semana',
            'created_at'=>Carbon::now()
        ]);
        
        //Insertamos la data en la tabla menus
        DB::table('informes')->insert($data);

    }
}
