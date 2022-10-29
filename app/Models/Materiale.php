<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Materiale
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $precio
 * @property $medida_id
 * @property $marca_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Materiale extends Model
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
    ['nombre',
    'descripcion',
    'precio',
    'medida_id',
    'marca_id'];


    public function marca()
    {
        return $this->hasOne('App\Models\Marca', 'id', 'marca_id');
    }
    public function medida()
    {
        return $this->hasOne('App\Models\Medida', 'id', 'medida_id');
    }
    
}
