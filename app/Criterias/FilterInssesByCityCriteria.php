<?php

namespace App\Criteria;

use App\Criterias\AppCriteria;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FilterInssesByCityCriteriaCriteria.
 *
 * @package namespace App\Criteria;
 */
class FilterInssesByCityCriteria extends AppCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $city = $this->request->query->get('city');

        if(ctype_alpha($city)){
            $model = $model->where('city', 'like', strtoupper($city));
        }

        return $model;
    }
}
