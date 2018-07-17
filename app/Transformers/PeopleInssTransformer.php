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
            'id'             => (int) $model->id,
            'cpf'            => $model->cpf,
            'name'           => $model->name,
            'birth_date'     => $model->birth_date,
            'beneficiary_nu' => $model->beneficiary_nu,
            'phone'          => $model->phone,
            'zip_code'       => $model->zip_code,
            'country'        => $model->country ? : 'BR',
            'state'          => $model->state,
            'city'           => $model->city,
            'district'       => $model->district,
            'street'         => $model->street,
//            'created_at'     => $model->created_at->toDateTimeString(),
//            'updated_at'     => $model->updated_at->toDateTimeString()
        ];
    }
}
