<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([]);
        //Llamamos los seeders que creamos
        $this->call([
            AccesoSeeder::class,
            CategoriaSeeder::class,
            PlatoSeeder::class,
            ProductoSeeder::class,
            EmpleadoSeeder::class,
            ClienteSeeder::class,
            MesaSeeder::class,
            MenuSeeder::class,
            PromocionSeeder::class,
            PedidoSeeder::class,
            DetallePedidoSeeder::class,
            ReservacionSeeder::class,
            PagoSeeder::class,
            InformeSeeder::class,
            DetalleInformeSeeder::class
        ]);
       
    }
}
