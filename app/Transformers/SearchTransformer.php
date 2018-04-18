<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Search;

/**
 * Class SearchTransformer.
 *
 * @package namespace App\Transformers;
 */
class SearchTransformer extends TransformerAbstract
{
    /**
     * Transform the Search entity.
     *
     * @param \App\Entities\Search $model
     *
     * @return array
     */
    public function transform(Search $model)
    {
        return [
            'id'         => (int) $model->id,
            'total'      => $model->total,
            'created_at' => $model->created_at->format('Y-m'),
            'updated_at' => $model->updated_at->toDateTimeString()
        ];
    }
}
