<?php

namespace App\Criterias;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FilterBySearchCriteria
 * @package App\Criterias
 */
class FilterBySearchCriteria extends AppCriteria implements CriteriaInterface
{

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $type          = $this->request->query->get('type');
        $search_id_old = $this->request->query->get('search_id_old');
        $search_id_new = $this->request->query->get('search_id_new');
        if (is_numeric($search_id_old)) {
            $model = $model->where('search_id_old', $search_id_old);
        }
        if (is_numeric($search_id_new)) {
            $model = $model->where('search_id_new', $search_id_new);
        }
        if (is_numeric($type)) {
            $model = $model->where('type', $type);
        }
        return $model;
    }
}
