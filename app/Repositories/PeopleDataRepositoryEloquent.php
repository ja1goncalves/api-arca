<?php

namespace App\Repositories;

use App\Presenters\PeopleDataPresenter;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PeopleDataRepository;
use App\Entities\PeopleData;
use App\Validators\PeopleDataValidator;

/**
 * Class PeopleDataRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PeopleDataRepositoryEloquent extends AppRepository implements PeopleDataRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PeopleData::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return PeopleDataValidator::class;
    }

    /**
     * @return mixed
     */
    public function presenter()
    {
        return PeopleDataPresenter::class;
    }

}
