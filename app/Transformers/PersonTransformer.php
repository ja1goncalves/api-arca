<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Person;

/**
 * Class PersonTransformer.
 *
 * @package namespace App\Transformers;
 */
class PersonTransformer extends TransformerAbstract
{
    /**
     * Transform the Person entity.
     *
     * @param \App\Entities\Person $model
     *
     * @return array
     */
    public function transform(Person $model)
    {
        return [
            'id'           => (int) $model->id,
            'name'         => $model->name,
            'cpf'          => $model->cpf,
            'institution'  => $model->institution,
            'registration' => $model->registration,
            'value_liquid' => $model->value_liquid,
            'search_id'    => $model->search_id,
            'status'       => $model->status,
            'status_title' => $model->statusTitle(),
            'office'       => $model->office,
            'observation'  => $model->observation,
//            'created_at' => $model->created_at->toDateTimeString(),
//            'updated_at' => $model->updated_at->toDateTimeString()
        ];
    }
}
