<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PromocionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array([
            'nombre'=>'Descuento en bebidas',
            'descripcion'=> '10% de descuento en todas las bebidas',
            'id_plato'=> 1,
            'descuento'=> 10,
            'fecha_inicio'=> now(),
            'fecha_fin'=> now()->addDays(7),
            'estado'=>1,
            'created_at'=>Carbon::now()
        ],[
            'nombre'=>'Descuento en comida',
            'descripcion'=> '5% de descuento en la compra de tacos',
            'id_plato'=> 2,
            'descuento'=> 5,
            'fecha_inicio'=> now(),
            'fecha_fin'=> now()->addDays(7),
            'estado'=>'Confirmada',
            'created_at'=>Carbon::now()
        ]);

        //Insertamos la data en la tabla promociones
        DB::table('promociones')->insert($data);
    }
}
