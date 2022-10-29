<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Materialservicio
 *
 * @property $id
 * @property $cantidad
 * @property $material_id
 * @property $servicio_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Materialservicio extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cantidad','material_id','servicio_id'];



}
