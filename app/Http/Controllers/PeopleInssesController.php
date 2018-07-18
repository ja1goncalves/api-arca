<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Services\PeopleInssService;
use App\Validators\PeopleInssValidator;
use App\Http\Controllers\Traits\CrudMethods;
use Illuminate\Support\Facades\Cache;

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

        $inssses = Cache::remember($cacheName, 172800, function () use($limit) {
            return $this->service->all($limit);
        });

        return response()->json($inssses, 200);
    }
}
