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
    /**
     *
     */
    use TransformableTrait;
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'cpf',
        'birth_date',
        'beneficiary_nu',
        'phone',
        'zip_code',
        'country',
        'state',
        'city',
        'district',
        'street'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
