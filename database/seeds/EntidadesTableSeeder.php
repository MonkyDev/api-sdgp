<?php

use Illuminate\Database\Seeder;
use App\Entidad;

class EntidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Entidad::create([
			'ck_entidad'	=>	'01',
			'desc_entidad'	=>	'AGUASCALIENTES',
			'abrv'			=>	'AGS',
		]);
		Entidad::create([
			'ck_entidad'	=>	'02',
			'desc_entidad'	=>	'BAJA CALIFORNIA',
			'abrv'			=>	'BC',
		]);
		Entidad::create([
			'ck_entidad'	=>	'03',
			'desc_entidad'	=>	'BAJA CALIFORNIA SUR',
			'abrv'			=>	'BCS',
		]);
		Entidad::create([
			'ck_entidad'	=>	'04',
			'desc_entidad'	=>	'CAMPECHE',
			'abrv'			=>	'CAMP',
		]);
		Entidad::create([
			'ck_entidad'	=>	'05',
			'desc_entidad'	=>	'COAHUILA DE ZARAGOZA',
			'abrv'			=>	'COAH',
		]);
		Entidad::create([
			'ck_entidad'	=>	'06',
			'desc_entidad'	=>	'COLIMA',
			'abrv'			=>	'COL',
		]);
		Entidad::create([
			'ck_entidad'	=>	'07',
			'desc_entidad'	=>	'CHIAPAS',
			'abrv'			=>	'CHIS',
		]);
		Entidad::create([
			'ck_entidad'	=>	'08',
			'desc_entidad'	=>	'CHIHUAHUA',
			'abrv'			=>	'CHIH',
		]);
		Entidad::create([
			'ck_entidad'	=>	'09',
			'desc_entidad'	=>	'CIUDAD DE MÉXICO',
			'abrv'			=>	'CDMX',
		]);
		Entidad::create([
			'ck_entidad'	=>	'10',
			'desc_entidad'	=>	'DURANGO',
			'abrv'			=>	'DGO',
		]);
		Entidad::create([
			'ck_entidad'	=>	'11',
			'desc_entidad'	=>	'GUANAJUATO',
			'abrv'			=>	'GTO',
		]);
		Entidad::create([
			'ck_entidad'	=>	'12',
			'desc_entidad'	=>	'GUERRERO',
			'abrv'			=>	'GRO',
		]);
		Entidad::create([
			'ck_entidad'	=>	'13',
			'desc_entidad'	=>	'HIDALGO',
			'abrv'			=>	'HGO',
		]);
		Entidad::create([
			'ck_entidad'	=>	'14',
			'desc_entidad'	=>	'JALISCO',
			'abrv'			=>	'JAL',
		]);
		Entidad::create([
			'ck_entidad'	=>	'15',
			'desc_entidad'	=>	'MÉXICO',
			'abrv'			=>	'MEX',
		]);
		Entidad::create([
			'ck_entidad'	=>	'16',
			'desc_entidad'	=>	'MICHOACÁN DE OCAMPO',
			'abrv'			=>	'MICH',
		]);
		Entidad::create([
			'ck_entidad'	=>	'17',
			'desc_entidad'	=>	'MORELOS',
			'abrv'			=>	'MOR',
		]);
		Entidad::create([
			'ck_entidad'	=>	'18',
			'desc_entidad'	=>	'NAYARIT',
			'abrv'			=>	'NAY',
		]);
		Entidad::create([
			'ck_entidad'	=>	'19',
			'desc_entidad'	=>	'NUEVO LEÓN',
			'abrv'			=>	'NL',
		]);
		Entidad::create([
			'ck_entidad'	=>	'20',
			'desc_entidad'	=>	'OAXACA',
			'abrv'			=>	'OAX',
		]);
		Entidad::create([
			'ck_entidad'	=>	'21',
			'desc_entidad'	=>	'PUEBLA',
			'abrv'			=>	'PUE',
		]);
		Entidad::create([
			'ck_entidad'	=>	'22',
			'desc_entidad'	=>	'QUERÉTARO',
			'abrv'			=>	'QRO',
		]);
		Entidad::create([
			'ck_entidad'	=>	'23',
			'desc_entidad'	=>	'QUINTANA ROO',
			'abrv'			=>	'QROO',
		]);
		Entidad::create([
			'ck_entidad'	=>	'24',
			'desc_entidad'	=>	'SAN LUIS POTOSÍ',
			'abrv'			=>	'SLP',
		]);
		Entidad::create([
			'ck_entidad'	=>	'25',
			'desc_entidad'	=>	'SINALOA',
			'abrv'			=>	'SIN',
		]);
		Entidad::create([
			'ck_entidad'	=>	'26',
			'desc_entidad'	=>	'SONORA',
			'abrv'			=>	'SON',
		]);
		Entidad::create([
			'ck_entidad'	=>	'27',
			'desc_entidad'	=>	'TABASCO',
			'abrv'			=>	'TAB',
		]);
		Entidad::create([
			'ck_entidad'	=>	'28',
			'desc_entidad'	=>	'TAMAULIPAS',
			'abrv'			=>	'TAMPS',
		]);
		Entidad::create([
			'ck_entidad'	=>	'29',
			'desc_entidad'	=>	'TLAXCALA',
			'abrv'			=>	'TLAX',
		]);
		Entidad::create([
			'ck_entidad'	=>	'30',
			'desc_entidad'	=>	'VERACRUZ DE IGNACIO DE LA LLAVE',
			'abrv'			=>	'VER',
		]);
		Entidad::create([
			'ck_entidad'	=>	'31',
			'desc_entidad'	=>	'YUCATÁN',
			'abrv'			=>	'YUC',
		]);
		Entidad::create([
			'ck_entidad'	=>	'32',
			'desc_entidad'	=>	'ZACATECAS',
			'abrv'			=>	'ZAC',
		]);

    }
}
