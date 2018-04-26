<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\AnalysisResult;

/**
 * Class AnalysisResultTransformer.
 *
 * @package namespace App\Transformers;
 */
class AnalysisResultTransformer extends TransformerAbstract
{
    /**
     * Transform the AnalysisResult entity.
     *
     * @param \App\Entities\AnalysisResult $model
     *
     * @return array
     */
    public function transform(AnalysisResult $model)
    {
        return [
            'id'             => (int) $model->id,
            'person_id'      => $model->person_id,
            'search_id_old'  => $model->search_id_old,
            'search_id_new'  => $model->search_id_new,
            'person'         => $model->person,
            'type'           => $model->type,
            'created_at'     => $model->created_at->toDateTimeString()
        ];
    }
}
