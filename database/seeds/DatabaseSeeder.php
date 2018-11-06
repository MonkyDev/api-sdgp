<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AutorizacionesTableSeeder::class);
        $this->call(CargosTableSeeder::class);
        $this->call(EntidadesTableSeeder::class);
        $this->call(FundamentosTableSeeder::class);
        $this->call(InstitucionesTableSeeder::class);
        $this->call(ModalidadesTableSeeder::class);
        $this->call(NivelesTableSeeder::class);
        $this->call(CarrerasTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
    }
}
