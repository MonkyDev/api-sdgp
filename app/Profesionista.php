<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesionista extends Model
{
    protected $table = 'profesionistas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'curp',
        'nombre',
        'primerApellido',
        'segundoApellido',
        'correoElectronico',
        'fechaInicio',
        'fechaTerminacion',
        'edo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'carrera_id', 'antecedente_id', 'created_at', 'updated_at',
    ];

    public function Titulos()
    {
        return $this->hasMany('App\Titulo');
    }

    public function carrera()
    {
        return $this->belongsTo('App\Carrera');
    }

    public function antecedente()
    {
        return $this->belongsTo('App\Antecedente');
    }
}
