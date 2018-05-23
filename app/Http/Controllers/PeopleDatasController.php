<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Validators\PeopleDataValidator;
use App\Services\PeopleDataService;
use App\Http\Controllers\Traits\CrudMethods;

/**
 * Class PeopleDatasController.
 *
 * @package namespace App\Http\Controllers;
 */
class PeopleDatasController extends Controller
{
    use CrudMethods;
    /**
     * @var PeopleDataService
     */
    protected $service;

    /**
     * @var PeopleDataValidator
     */
    protected $validator;

    /**
     * PeopleDatasController constructor.
     * @param PeopleDataService $service
     * @param PeopleDataValidator $validator
     */
    public function __construct(PeopleDataService $service, PeopleDataValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }

}
