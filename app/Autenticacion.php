<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autenticacion extends Model
{
    protected $table = 'autenticaciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'version',
        'folioDigital',
        'fechaAutenticacion',
        'selloTitulo',
        'noCertificadoAutoridad',
        'selloAutenticacion',
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
