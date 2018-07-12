<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\AnalysisResultService;
use App\Http\Controllers\Traits\CrudMethods;
use App\Validators\AnalysisResultValidator;
use Illuminate\Support\Facades\Cache;

/**
 * Class AnalysisResultsController.
 *
 * @package namespace App\Http\Controllers;
 */
class AnalysisResultsController extends AppController
{
    use CrudMethods;
    /**
     * @var AnalysisResultService
     */
    protected $service;

    /**
     * @var AnalysisResultValidator
     */
    protected $validator;

    /**
     * AnalysisResultsController constructor.
     * @param AnalysisResultService $service
     * @param AnalysisResultValidator $validator
     */
    public function __construct(AnalysisResultService $service, AnalysisResultValidator $validator)
    {
        $this->service   = $service;
        $this->validator = $validator;
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

        $results = Cache::remember($cacheName, 43200, function () use($limit) {
            return $this->service->all($limit);
        });

        return response()->json($results, 200);
    }
}
