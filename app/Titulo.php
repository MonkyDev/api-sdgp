<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
	protected $table = 'titulos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'version',
		'folioControl',
		'estatus',
		'edo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'responsable_id',
		'carrera_id',
		'profesionista_id',
		'expedicion_id',
		'antecedente_id',
		'autenticacion_id',
		'created_at',
		'updated_at',
    ];

	public function responsable()
	{
		return $this->belongsTo('App\Responsable');
	}

	public function carrera()
	{
		return $this->belongsTo('App\Carrera');
	}

	public function profesionista()
	{
		return $this->belongsTo('App\Profesionista');
	}

	public function expedicion()
	{
		return $this->belongsTo('App\Expedicion');
	}

	public function antecedente()
	{
		return $this->belongsTo('App\Antecedente');
	}

	public function autenticacion()
	{
		return $this->belongsTo('App\Autenticacion');
	}


}
