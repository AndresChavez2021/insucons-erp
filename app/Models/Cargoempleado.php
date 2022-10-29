<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cargoempleado
 *
 * @property $id
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $persona_id
 * @property $cargo_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cargoempleado extends Model
{
    
    static $rules = [
		'fecha_inicio' => 'required',
		'fecha_fin' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable =
     ['fecha_inicio',
     'fecha_fin',
     'persona_id',
     'cargo_id'];

     //model Cargoempleado
  //  public function cargos(){
  //      return $this->belongsTo('App\Models\Cargo');
  //    }
  //    public function personas(){
  //      return $this->belongsTo('App\Models\Persona');
  //  }

}
