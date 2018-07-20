<?php

namespace App\Criteria;

use App\Criterias\AppCriteria;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FilterInssesByStateCriteria.
 *
 * @package namespace App\Criteria;
 */
class FilterInssesByStateCriteria extends AppCriteria implements CriteriaInterface
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

        if(ctype_alpha($state)){
            if(count($state) != 2){
                $tab = [' ', '  ', '   ', '    ', '     ', '      '];
                $state = str_replace($tab, '', $state);
            }

            if (count($state) == 2) {
                $model = $model->where('state', 'like', strtoupper($state));
            }
        }

        return $model;
    }
}
