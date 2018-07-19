<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autorizacion extends Model
{
    protected $table = 'autorizaciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'desc_autorizacion',
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

    /**
     * Relación (1:N) un único registro de este modelo pertenece a muchos del otro modelo
     * como la relación es muchos del otro lado el método es en plural haciendo referencia al modelo.
     * En el modelo referencial se determinará que la llave foranea es de acuerdo al nombre de este modelo
     * por lo que la llave foranea en Modelo de Carrera se llamará por estandar autorizacion_id.
     */
    public function carreras()
    {
        return $this->hasMany('App\Carrera');
    }
}
