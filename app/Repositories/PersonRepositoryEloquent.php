<?php

namespace App\Repositories;

use App\Presenters\PersonPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PersonRepository;
use App\Entities\Person;
use App\Validators\PersonValidator;

/**
 * Class PersonRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PersonRepositoryEloquent extends BaseRepository implements PersonRepository
{

    protected $fieldSearchable = [
        'id',
        'cpf'          => 'like',
        'name'         => 'like',
        'registration' => 'like',
    ];

    /**
     * Regras para busca
     *
     * @var array
     */
    protected $fieldsRules = [
        'id'            => ['numeric', 'max:2147483647'],
        'name'          => ['max:100'],
        'cpf'           => ['max:20'],
        'registration'  => ['max:100'],
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Person::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return PersonValidator::class;
    }

    /**
     * @return mixed
     */
    public function presenter()
    {
        return PersonPresenter::class;
    }

}
