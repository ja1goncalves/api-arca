<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Person.
 *
 * @package namespace App\Entities;
 */
class Person extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'institution',
        'cpf',
        'name',
        'registration',
        'category',
        'office',
        'function_person',
        'maturity_office',
        'value_liquid',
    ];
    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    const STATUS_ENTRADA = 0;
    const STATUS_PERMANENCIA = 1;
    const STATUS_SAIDA = 2;

}
