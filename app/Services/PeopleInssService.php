<?php

namespace App\Services;

use App\Repositories\PeopleInssRepository;
use App\Services\Traits\CrudMethods;

/**
 * Class BankAccountService
 * @package App\Services
 */
class PeopleInssService extends AppService
{
    use CrudMethods{
        all    as public processAll;
    }
    /**
     * @var PeopleInssRepository
     */
    protected $repository;

    public function __construct(PeopleInssRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all(int $limit = 20)
    {

//        $this->repository
//            ->resetCriteria()
//            ->pushCriteria(app('App\Criterias\FilterByPeopleDataCriteria'))
//            ->pushCriteria(app('App\Criterias\AppRequestCriteria'));
        return $this->processAll($limit);
    }

}