<?php

namespace App\Services;

use App\Repositories\SearchRepository;
use App\Services\Traits\CrudMethods;

/**
 * Class BankAccountService
 * @package App\Services
 */
class SearchService extends AppService
{
    use CrudMethods;

    /**
     * @var SearchRepository
     */
    protected $repository;

    public function __construct(SearchRepository $repository)
    {
        $this->repository = $repository;
    }

}