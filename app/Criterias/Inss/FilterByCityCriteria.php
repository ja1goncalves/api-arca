<?php

namespace App\Criterias\Inss;

use App\Criterias\AppCriteria;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use App\AppHelper;

/**
 * Class FilterByCityCriteria.
 *
 * @package namespace App\Criterias\Inss;
 */
class FilterByCityCriteria extends AppCriteria implements CriteriaInterface
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
        if (isset($city)) $model = $model->where('city', 'like', strtoupper($city));
        return $model;
    }
}
