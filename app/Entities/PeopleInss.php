<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PeopleInss.
 *
 * @package namespace App\Entities;
 */
class PeopleInss extends Model implements Transformable
{
    use TransformableTrait;
    /**
     * @var array
     */
    protected $fillable = [
        'cpf',
        'name',
        'beneficiary_nu',
        'birth_date',
        'phone',
        'cpf',
        'country',
        'district',
        'city',
        'zip_code',
        'state',
        'street'
    ];


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
