<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PeopleData.
 *
 * @package namespace App\Entities;
 */
class PeopleData extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'people_data';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpf',
        'name',
        'phone',
        'ddd',
        'address',
        'complement',
        'district',
        'city',
        'zip_code',
        'state_abbreviation',
        'cellphone_op'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
