<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Search.
 *
 * @package namespace App\Entities;
 */
class Search extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
