<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
  	protected $table = 'responsables';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'sello',
		'certificadoResponsable',
		'noCertificadoResponsable',
		'edo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'firma_id', 'cargo_id', 'created_at', 'updated_at',
    ];

    public function Firma()
    {
    	return $this->belongsTo('App\Firma');
    }

    public function Cargo()
    {
		return $this->belongsTo('App\Cargo');
    }

    public function Titulos()
    {
        return $this->hasMany('App\Titulo');
    }
}
