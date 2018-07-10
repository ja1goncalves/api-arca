<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\User;

/**
 * Class UserTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * Transform the User entity.
     *
     * @param \App\Entities\User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,
            'type_user'  => $model->type_user,
            'name'       => $model->name,
            'password'   => $model->password,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
