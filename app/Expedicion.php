<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expedicion extends Model
{
	protected $table = 'expediciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'fechaExpedicion',
		'fechaExamenProfesional',
		'fechaExencionExamenProfesional',
		'cumplioServicioSocial',
		'edo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'modalidad_id', 'fundamento_id', 'entidad_id', 'created_at', 'updated_at',
    ];

    public function modalidad()
    {
    	return $this->belongsTo('App\Modalidad');
    }

    public function fundamento()
    {
    	return $this->belongsTo('App\Fundamento');
    }

    public function entidad()
    {
    	return $this->belongsTo('App\Entidad');
    }

    public function Titulos()
    {
        return $this->hasMany('App\Titulo');
    }
}
