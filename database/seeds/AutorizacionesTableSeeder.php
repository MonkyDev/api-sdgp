<?php

use Illuminate\Database\Seeder;
use App\Autorizacion;

class AutorizacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		Autorizacion::create([
		'desc_autorizacion' => 'RVOE FEDERAL',
		'edo' => 1,
		]);
		Autorizacion::create([
		'desc_autorizacion' => 'RVOE ESTATAL',
		'edo' => 1,
		]);
		Autorizacion::create([
		'desc_autorizacion' => 'AUTORIZACIÓN FEDERAL',
		'edo' => 1,
		]);
		Autorizacion::create([
		'desc_autorizacion' => 'AUTORIZACIÓN ESTATAL',
		'edo' => 1,
		]);
		Autorizacion::create([
		'desc_autorizacion' => 'ACTA DE SESIÓN',
		'edo' => 1,
		]);
		Autorizacion::create([
		'desc_autorizacion' => 'ACUERDO DE INCORPORACIÓN',
		'edo' => 1,
		]);
		Autorizacion::create([
		'desc_autorizacion' => 'ACUERDO SECRETARIAL SEP',
		'edo' => 1,
		]);
		Autorizacion::create([
		'desc_autorizacion' => 'DECRETO DE CREACIÓN',
		'edo' => 1,
		]);
		Autorizacion::create([
		'desc_autorizacion' => 'OTRO',
		'edo' => 1,
		]);

    }
}
