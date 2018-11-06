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
			'profesionista_id',
			'expedicion_id',
			'autenticacion_id',
			'created_at',
			'updated_at',
    ];

	public function responsable()
	{
		return $this->belongsTo('App\Responsable');
	}

	public function profesionista()
	{
		return $this->belongsTo('App\Profesionista');
	}

	public function expedicion()
	{
		return $this->belongsTo('App\Expedicion');
	}

	public function autenticacion()
	{
		return $this->belongsTo('App\Autenticacion');
	}


}
