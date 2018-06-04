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
        $tab  = [' ','  ','   ','    '];
        $name = str_replace($tab, " ",$this->request->query->get('name'));
        $str  = ['-','.'];
        $cpf  = str_replace($str, "",$this->request->query->get('cpf'));
        $name = trim(str_replace(" ", "_",$name ));
        $cpf  = str_replace("*", "_",$cpf);
        if (isset($name)) {
            $model = $model->where('name','like',$name);
        }
        if (isset($cpf)) {
            $model = $model->where('cpf','like', $cpf);
        }
        return $model;
    }
}
