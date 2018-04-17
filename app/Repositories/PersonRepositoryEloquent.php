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
class PersonRepositoryEloquent extends AppRepository implements PersonRepository
{

    protected $fieldSearchable = [
        'id',
        'institution'  => 'ilike',
        'cpf'          => 'ilike',
        'name'         => 'ilike',
        'registration' => 'ilike',
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
