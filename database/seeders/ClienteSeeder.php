<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array([
            'nombre'=>'Carolina',
            'apellido'=>'Herrera',
            'correo'=>'carolina123@gmail.com',
            'telefono'=>'7896-1234',
            'direccion'=>'San Juan Nonualco, calle principal, casa #2',
            'created_at'=>Carbon::now()
        ],[
            'nombre'=>'Alejandrina',
            'apellido'=>'Cartajena',
            'correo'=>'aleC789@gmail.com',
            'telefono'=>'7456-9632',
            'direccion'=>'Jiquilisco, casa #5',
            'created_at'=>Carbon::now()
        ]);

        //Insertamos la data en la tabla clientes
        DB::table('clientes')->insert($data);
    }
}
