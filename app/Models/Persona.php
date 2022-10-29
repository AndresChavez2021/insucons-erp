<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Persona
 *
 * @property $id
 * @property $ci
 * @property $apellido_paterno
 * @property $apellido_materno
 * @property $nombre
 * @property $telefono
 * @property $direccion
 * @property $nit
 * @property $tipo
 * @property $fecha_nacimiento
 * @property $sueldo
 * @property $T_C
 * @property $T_E
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Persona extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'T_C' => 'required',
		'T_E' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = 
    ['ci',
    'apellido_paterno',
    'apellido_materno',
    'nombre','telefono',
    'direccion',
    'nit',
    'tipo',
    'fecha_nacimiento',
    'sueldo',
    'T_C',
    'T_E'
    ];
 

    //model persona
    public function cargos(){
      return $this->belongsToMany('App\Models\Cargo');
  }
  public function notas()
  {
      return $this->hasMany('App\Models\Nota', 'persona_id', 'id');
  }
}
