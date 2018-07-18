<?php

namespace App\Services;

use App\Repositories\PeopleDataRepository;
use App\Services\Traits\CrudMethods;

/**
 * Class BankAccountService
 * @package App\Services
 */
class PeopleDataService extends AppService
{
    use CrudMethods{
        all    as public processAll;
    }
    /**
     * @var PeopleDataRepository
     */
    protected $repository;

    public function __construct(PeopleDataRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all(int $limit = 20)
    {

        $this->repository
            ->resetCriteria()
            ->pushCriteria(app('App\Criterias\AppRequestCriteria'))
            ->pushCriteria(app('App\Criterias\FilterByPeopleDataCriteria'));
        return $this->processAll($limit);
    }
}