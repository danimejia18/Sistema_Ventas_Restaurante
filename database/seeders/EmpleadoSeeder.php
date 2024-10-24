<?php

namespace Database\Seeders;

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
        $data = [
            [
                'nombre' => 'Miguel',
                'apellido' => 'Paredes',
                'correo' => 'miguelP589@gmail.com',
                'telefono' => '7789-6321',
                'rol' => 'Cocinero',
                'password' => bcrypt('Hola'), // Cambia esto por la nueva password
                'id_acceso' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'nombre' => 'Delmira',
                'apellido' => 'Cañas',
                'correo' => 'canasDelmy@gmail.com',
                'telefono' => '7213-7896',
                'rol' => 'Mesero',
                'password' => bcrypt('Hi'), // Cambia esto por la nueva password
                'id_acceso' => 2,
                'created_at' => Carbon::now()
            ]
        ];

        // Asegúrate de que se usen insert or update
        foreach ($data as $empleado) {
            DB::table('empleados')->updateOrInsert(
                ['correo' => $empleado['correo']], // Condición para verificar si ya existe
                $empleado // Datos que se insertarán o actualizarán
            );
        }
    }
}
