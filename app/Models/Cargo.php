<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cargo
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cargo extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable =
    
    ['nombre'];

    // model Cargo 

     public function personas(){
        return $this->belongsToMany('App\Models\Persona');
    }

    // public function personas(){
    //   return $this->belongsToMany(Cargo::class,'App\Models\Cargo');
    // }
      
}
