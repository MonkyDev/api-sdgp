<?php

use Illuminate\Database\Seeder;
use App\Nivel;

class NivelesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Nivel::create([
			'desc_nivel'	=>	'MAESTRÍA',
			'tipo_nivel'	=>'EDUCACIÓN SUPERIOR',
		]);
		Nivel::create([
			'desc_nivel'	=>	'LICENCIATURA',
			'tipo_nivel'	=>'EDUCACIÓN SUPERIOR',
		]);
		Nivel::create([
			'desc_nivel'	=>	'TÉCNICO',
			'tipo_nivel'	=>'SUPERIOR UNIVERSITARIO	EDUCACIÓN SUPERIOR',
		]);
		Nivel::create([
			'desc_nivel'	=>	'BACHILLERATO',
			'tipo_nivel'	=>'EDUCACIÓN MEDIA SUPERIOR',
		]);
		Nivel::create([
			'desc_nivel'	=>	'EQUIVALENTE',
			'tipo_nivel'	=>'A BACHILLERATO 	EDUCACIÓN MEDIA SUPERIOR',
		]);
		Nivel::create([
			'desc_nivel'	=>	'SECUNDARIA',
			'tipo_nivel'	=>'EDUCACIÓN BÁSICA',
		]);


    }
}
