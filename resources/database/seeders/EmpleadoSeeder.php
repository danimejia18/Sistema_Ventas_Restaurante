<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array([
            'nombre'=>'Miguel',
            'apellido'=>'Paredes',
            'correo'=>'miguelP589@gmail.com',
            'telefono'=>'7789-6321',
            'rol'=>'Cocinero',
            'contraseña'=>bcrypt('password_short'),
            'id_acceso'=> 1,
            'created_at'=>Carbon::now()
        ],[
            'nombre'=>'Delmira',
            'apellido'=>'Cañas',
            'correo'=>'canasDelmy@gmail.com',
            'telefono'=>'7213-7896',
            'rol'=>'Mesero',
            'contraseña'=>bcrypt('password_short'),
            'id_acceso'=> 2,
            'created_at'=>Carbon::now()
        ]);

        //Insertamos la data en la tabla e
        DB::table('empleados')->insert($data); // Esto eliminará todos los registros de la tabla empleados

    }
}
