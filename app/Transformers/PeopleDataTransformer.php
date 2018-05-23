<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\PeopleData;

/**
 * Class PeopleDataTransformer.
 *
 * @package namespace App\Transformers;
 */
class PeopleDataTransformer extends TransformerAbstract
{
    /**
     * Transform the PeopleData entity.
     *
     * @param \App\Entities\PeopleData $model
     *
     * @return array
     */
    public function transform(PeopleData $model)
    {
        return [
            'id'                 => (int) $model->id,
            'name'               => $model->name,
            'cpf'                => $model->cpf,
            'phone'              => $model->phone,
            'ddd'                => $model->ddd,
            'address'            => $model->address,
            'complement'         => $model->complement,
            'district'           => $model->district,
            'city'               => $model->city,
            'zip_code'           => $model->zip_code,
            'state_abbreviation' => $model->state_abbreviation,
            'cellphone_op'       => $model->cellphone_op,
            'created_at'         => $model->created_at->toDateTimeString(),
            'updated_at'         => $model->updated_at->toDateTimeString()
        ];
    }
}
