<?php

namespace App\Criterias;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FilterBySearchCriteria
 * @package App\Criterias
 */
class FilterByPeopleDataCriteria extends AppCriteria implements CriteriaInterface
{

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $name  = $this->request->query->get('name');
        $cpf   = $this->request->query->get('cpf');

        if (isset($name)) {
            $model = $model->where('name','like',$name);
        }
        if (isset($cpf)) {
            $model = $model->where('cpf','like', $cpf);
        }
        \Log::debug($model->toSql());
        return $model;
    }
}
