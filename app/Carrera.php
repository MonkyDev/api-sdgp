<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carreras';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       	'cveCarrera',
		'nombreCarrera',
		'modalidad',
		'nivel',
		'fechaInicio',
		'fechaTerminacion',
		'noRevoe',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    	'autorizacion_id',
		'institucion_id',
        'created_at',
        'updated_at',
    ];

    /**
     * como este modelo es hijo podemos acceder al registro conincidido del modelo padre
     */
    public function autorizacion()
    {
    	return $this->belongsTo('App\Autorizacion');
    }

    public function institucion()
    {
    	return $this->belongsTo('App\Institucion');
    }

    public function Titulos()
    {
        return $this->hasMany('App\Titulo');
    }
}
