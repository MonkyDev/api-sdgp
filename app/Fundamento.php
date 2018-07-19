<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fundamento extends Model
{
    protected $table = 'fundamentos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'desc_fundamento',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function expediciones()
    {
        return $this->hasMany('App\Expedicion');
    }
}
