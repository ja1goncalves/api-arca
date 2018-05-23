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
    use CrudMethods;

    /**
     * @var PeopleDataRepository
     */
    protected $repository;

    public function __construct(PeopleDataRepository $repository)
    {
        $this->repository = $repository;
    }

}