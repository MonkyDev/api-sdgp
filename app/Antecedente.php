<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
	protected $table = 'antecedentes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'institucionProcedencia',
		'fechaInicio_ant',
		'fechaTerminacion_ant',
		'noCedula',
		'edo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'entidad_id', 'nivel_id', 'created_at', 'updated_at',
    ];

    public function entidad()
    {
    	return $this->belongsTo('App\Entidad');
    }

    public function nivel()
    {
    	return $this->belongsTo('App\Nivel');
    }

    public function Titulos()
    {
        return $this->hasMany('App\Titulo');
    }
}
