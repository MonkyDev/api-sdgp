<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firma extends Model
{
    protected $table = 'firmas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'primerApellido',
        'segundoApellido',
        'curp',
        'abrTitulo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function responsables()
    {
        return $this->hasMany('App\Responsable');
    }
}
