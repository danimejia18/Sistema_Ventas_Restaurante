<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AccesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Definimos el arreglo de datos a insertar
        $data = array([
            'tipo_acceso' => 'Admin', 
            'descripcion' => 'Aceso completo',
            'created_at'=>Carbon::now()

        ],[
            'tipo_acceso' => 'Usuario', 
            'descripcion' => 'Aceso limitado',
            'created_at'=>Carbon::now()

        ]);

        //Insertamos la data en la tabla accesos
        DB::table('accesos')->insert($data);
    }
}
