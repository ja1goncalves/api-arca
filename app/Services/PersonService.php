<?php

namespace App\Services;

use App\Repositories\PersonRepository;
use App\Services\Traits\CrudMethods;

/**
 * Class BankAccountService
 * @package App\Services
 */
class PersonService extends AppService
{
    use CrudMethods;

    /**
     * @var PersonRepository
     */
    protected $repository;

    public function __construct(PersonRepository $repository)
    {
        $this->repository = $repository;
    }

}