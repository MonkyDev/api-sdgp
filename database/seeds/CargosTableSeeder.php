<?php

use Illuminate\Database\Seeder;
use App\Cargo;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Cargo::create([
			'desc_cargo'=>'DIRECTOR',
			'edo' 		=>1,
		]);
		Cargo::create([
			'desc_cargo'=> 'SUBDIRECTOR',
			'edo'		=> 1,
		]);
		Cargo::create([
			'desc_cargo'=> 'RECTOR',
			'edo' 		=> 1,
		]);
		Cargo::create([
			'desc_cargo'=> 'VICERRECTOR',
			'edo'		=> 1,
		]);
		Cargo::create([
			'desc_cargo'=> 'RESPONSABLE DE EXPEDICIÓN ',
			'edo' 		=> 1,
		]);
		Cargo::create([
			'desc_cargo'=> 'SECRETARIO GENERAL',
			'edo' 		=> 1,
		]);
		Cargo::create([
			'desc_cargo'=> 'AUTORIDAD LOCAL',
			'edo' 		=> 1,
		]);
		Cargo::create([
			'desc_cargo'=> 'AUTORIDAD FEDERAL',
			'edo' 		=> 1,
		]);
	}
}
