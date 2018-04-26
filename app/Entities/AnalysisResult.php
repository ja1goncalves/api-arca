<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class AnalysisResult.
 *
 * @package namespace App\Entities;
 */
class AnalysisResult extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'person_id',
        'search_id_old',
        'search_id_new',
        'type'
    ];
    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TYPE_ENTRADA = 0;
    const TYPE_SAIDA   = 1;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Person()
    {
        return $this->belongsTo(Person::class);
    }

    /**
     * @return string
     */
    public function type_title()
    {
        return $this->attributes['type'] = 1 ? 'Saiu' : 'Entrou';
    }
}
