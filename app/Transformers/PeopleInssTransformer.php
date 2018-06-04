<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\PeopleInss;

/**
 * Class PeopleInssTransformer.
 *
 * @package namespace App\Transformers;
 */
class PeopleInssTransformer extends TransformerAbstract
{
    /**
     * Transform the PeopleInss entity.
     *
     * @param \App\Entities\PeopleInss $model
     *
     * @return array
     */
    public function transform(PeopleInss $model)
    {
        return [
            'id'            => (int) $model->id,

            'name'          => $model->name,
            'cpf'           => $model->cpf,
            'phone'         => $model->phone,
            'zip_code'      => $model->zip_code,
            'country'       => $model->country,
            'state'         => $model->state,
            'city'          => $model->city,
            'district'      => $model->district,
            'street'        => $model->street,

            'created_at'    => $model->created_at->toDateTimeString(),
            'updated_at'    => $model->updated_at->toDateTimeString(),
        ];
    }
}
