<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Validators\PersonValidator;
use App\Services\PersonService;
use App\Http\Controllers\Traits\CrudMethods;

/**
 * Class PeopleController.
 *
 * @package namespace App\Http\Controllers;
 */
class PeopleController extends AppController
{
    use CrudMethods;
    /**
     * @var PersonService
     */
    protected $service;

    /**
     * @var PersonValidator
     */
    protected $validator;

    /**
     * PeopleController constructor.
     * @param PersonService $service
     * @param PersonValidator $validator
     */
    public function __construct(PersonService $service, PersonValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }

}
