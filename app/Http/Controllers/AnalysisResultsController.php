<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\AnalysisResultService;
use App\Http\Controllers\Traits\CrudMethods;
use App\Validators\AnalysisResultValidator;

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
        $this->service = $service;
        $this->validator  = $validator;
    }
}
