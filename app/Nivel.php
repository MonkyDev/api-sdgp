<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
 	protected $table = 'niveles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'desc_nivel',
        'tipo_nivel',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function antecedentes()
    {
        return $this->hasMany('App\Actecedente');
    }

}
