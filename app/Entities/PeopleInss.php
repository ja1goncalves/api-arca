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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name',
                            'cpf',
                            'phone',
                            'zip_code',
                            'country',
                            'state',
                            'city',
                            'district',
                            'street'];

    protected $dates = ['created_at', 'updated_at'];

    //protected $hidden = [];

}
