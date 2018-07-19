<?php

use Illuminate\Database\Seeder;
use App\Modalidad;

class ModalidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Modalidad::create([
			'desc_modalidad'	=>	'POR TESIS',
			'tipo_modalidad'	=>	'ACTA DE EXAMEN',
		]);
		Modalidad::create([
			'desc_modalidad'	=>	'POR PROMEDIO',
			'tipo_modalidad'	=>	'CONSTANCIA DE EXENCIÓN',
		]);
		Modalidad::create([
			'desc_modalidad'	=>	'POR ESTUDIOS DE POSGRADOS',
			'tipo_modalidad'	=>	'CONSTANCIA DE EXENCIÓN',
		]);
		Modalidad::create([
			'desc_modalidad'	=>	'POR EXPERIENCIA LABORAL',
			'tipo_modalidad'	=>	'CONSTANCIA DE EXENCIÓN',
		]);
		Modalidad::create([
			'desc_modalidad'	=>	'POR CENEVAL',
			'tipo_modalidad'	=>	'CONSTANCIA DE EXENCIÓN',
		]);
		Modalidad::create([
			'desc_modalidad'	=>	'OTRO',
			'tipo_modalidad'	=>	'CONSTANCIA DE EXENCIÓN',
		]);
    }
}
