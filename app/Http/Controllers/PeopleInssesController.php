<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Services\PeopleInssService;
use App\Validators\PeopleInssValidator;
use App\Http\Controllers\Traits\CrudMethods;

/**
 * Class PeopleInssesController.
 *
 * @package namespace App\Http\Controllers;
 */
class PeopleInssesController extends Controller
{
    use CrudMethods;
    /**
     * @var PeopleInssService
     */
    protected $service;

    /**
     * @var PeopleInssValidator
     */
    protected $validator;

    /**
     * PeopleDatasController constructor.
     * @param PeopleInssService $service
     * @param PeopleInssValidator $validator
     */
    public function __construct(PeopleInssService $service, PeopleInssValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }
}
