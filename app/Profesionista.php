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
        'edo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function Titulos()
    {
        return $this->hasMany('App\Titulo');
    }
}
