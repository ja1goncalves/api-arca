<?php

namespace App\Repositories;

use App\Presenters\PeopleInssPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PeopleInssRepository;
use App\Entities\PeopleInss;
use App\Validators\PeopleInssValidator;

/**
 * Class PeopleInssRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PeopleInssRepositoryEloquent extends AppRepository implements PeopleInssRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PeopleInss::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PeopleInssValidator::class;
    }

    /**
     * @return mixed
     */
    public function presenter()
    {
        return PeopleInssPresenter::class;
    }

}
