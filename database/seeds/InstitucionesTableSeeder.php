<?php

use Illuminate\Database\Seeder;
use App\Institucion;

class InstitucionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Institucion::create([
		    'clave'				=> '070070	',
	        'nombre'			=> 'INSTITUTO DE ESTUDIOS SUPERIORES DE CHIAPAS',
	        'tipo_sostenimiento'=> 'PRIVADO',
	        'tipo_educativo'	=> 'EDUCACIÓN SUPERIOR',
	    ]);
    }
}
