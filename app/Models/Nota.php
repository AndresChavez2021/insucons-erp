<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Nota
 *
 * @property $id
 * @property $descripcion
 * @property $fecha
 * @property $persona_id
 * @property $proveedor_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Nota extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'fecha' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = 
    [
      'tipo',
    'descripcion',
    'fecha',
    'persona_id',
    'proveedor_id'];

 public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'persona_id');
    }
    public function proveedor()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'proveedor_id');
    }  

}
