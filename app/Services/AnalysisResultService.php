<?php

namespace App\Services;

use App\Entities\Person;
use App\Repositories\AnalysisResultRepository;
use App\Services\Traits\CrudMethods;

/**
 * Class BankAccountService
 * @package App\Services
 */
class AnalysisResultService extends AppService
{
    use CrudMethods{
        all  as public processAll;
    }
    /**
     * @var AnalysisResultRepository
     */
    protected $repository;

    public function __construct(AnalysisResultRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all(int $limit = 20)
    {

        $this->repository
            ->resetCriteria()
            ->pushCriteria(app('App\Criterias\FilterBySearchCriteria'))
            ->pushCriteria(app('App\Criterias\FilterByStatusCriteria'))
            ->pushCriteria(app('App\Criterias\AppRequestCriteria'));
        return $this->processAll($limit);
    }
}