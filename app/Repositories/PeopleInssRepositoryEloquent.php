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

    protected $fieldSearchable = [
        'id',
        'name' => 'like',
        'cpf' => 'like',
        'zip_code' => 'like',
    ];

    protected $fieldsRules = [
        'id'            => ['numeric', 'max:2147483647'],
        'name'          => ['max:100'],
        'cpf'           => ['numeric', 'max:2147483647'],
        'zip_code'      => ['numeric', 'max:2147483647'],
    ];

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
