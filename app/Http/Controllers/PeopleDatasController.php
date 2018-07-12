<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Validators\PeopleDataValidator;
use App\Services\PeopleDataService;
use App\Http\Controllers\Traits\CrudMethods;
use Illuminate\Support\Facades\Cache;

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
