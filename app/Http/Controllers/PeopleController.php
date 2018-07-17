<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Validators\PersonValidator;
use App\Services\PersonService;
use App\Http\Controllers\Traits\CrudMethods;
use Illuminate\Support\Facades\Cache;

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
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $limit = $request->query->get('limit', 15);

        $cacheName = str_replace($request->url(), '', $request->fullUrl());

        $people = Cache::remember($cacheName, 43200, function () use($limit) {
            return $this->service->all($limit);
        });

        return response()->json($people, 200);
    }
}
