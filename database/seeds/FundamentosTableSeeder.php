<?php

use Illuminate\Database\Seeder;
use App\Fundamento;

class FundamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Fundamento::create([
			'desc_fundamento'	=>	'ART. 52 LRART. 5 CONST',
		]);
		Fundamento::create([
			'desc_fundamento'	=>	'ART. 55 LRART. 5 CONST',
		]);
		Fundamento::create([
			'desc_fundamento'	=>	'ART. 91 RLRART. 5 CONST',
		]);
		Fundamento::create([
			'desc_fundamento'	=>	'ART. 10 REGLAMENTO PARA LA PRESTACIÓN DEL SERVICIO SOCIAL DE LOS ESTUDIANTES DE LAS INSTITUCIONES DE EDUCACIÓN SUPERIOR EN LA REPÚBLICA MEXICANA ',
		]);
		Fundamento::create([
			'desc_fundamento'	=>	'NO APLICA',
		]);

    }
}
