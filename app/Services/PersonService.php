<?php

namespace App\Services;

use App\Entities\Person;
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

    /**
     * @return mixed
     */
    public function getPersonPermanent()
    {
        $person = $this->findWhere(['status' => Person::STATUS_PERMANENCIA], true);
        if (empty($person))
        {
            $person = $this->findWhere(['status' => Person::STATUS_ENTRADA], true);
        }
        return $person->search_id;
    }
}