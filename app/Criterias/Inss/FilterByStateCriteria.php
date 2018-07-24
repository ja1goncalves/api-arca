<?php

namespace App\Criterias\Inss;

use App\Criterias\AppCriteria;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FilterByStateCriteria.
 *
 * @package namespace App\Criterias\Inss;
 */
class FilterByStateCriteria extends AppCriteria implements CriteriaInterface
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
        $state = $this->request->query->get('state');

        if(strtoupper($state) == 'NONE'){ // pessoas com o estado não informado
            return $model->where([['state', '=', ''], ['state', '=', ' ']]);
        }

        if(ctype_alpha($state)) {
            $model = $model->where('state', '=', strtoupper($state));
        }

        return $model;
    }
}
