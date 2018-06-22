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
            'birth_date'    => $model->birth_date,
            'beneficiary_nu'=> $model->beneficiary_nu,
            'phone'         => $model->phone,
            'country'       => $model->country ?:'BR',
            'state'         => $model->state,
            'city'          => $model->city,
            'district'      => $model->district,
            'street'        => $model->street,
            'created_at'    => isset($model->created_at) ? $model->created_at->toDateTimeString() : null,
            'updated_at'    => isset($model->updated_at) ? $model->updated_at->toDateTimeString() : null,
        ];
    }
}
