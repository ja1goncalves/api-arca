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
    use CrudMethods;

    /**
     * @var AnalysisResultRepository
     */
    protected $repository;

    public function __construct(AnalysisResultRepository $repository)
    {
        $this->repository = $repository;
    }

}