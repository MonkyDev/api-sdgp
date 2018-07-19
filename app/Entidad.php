<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    protected $table = 'entidades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ck_entidad',
        'desc_entidad',
        'abrv',
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

    public function expediciones()
    {
        return $this->hasMany('App\Expedicion');
    }
}
