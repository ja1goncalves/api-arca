<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AnalysisResultCreateRequest;
use App\Http\Requests\AnalysisResultUpdateRequest;
use App\Repositories\AnalysisResultRepository;
use App\Validators\AnalysisResultValidator;

/**
 * Class AnalysisResultsController.
 *
 * @package namespace App\Http\Controllers;
 */
class AnalysisResultsController extends Controller
{
    /**
     * @var AnalysisResultRepository
     */
    protected $repository;

    /**
     * @var AnalysisResultValidator
     */
    protected $validator;

    /**
     * AnalysisResultsController constructor.
     *
     * @param AnalysisResultRepository $repository
     * @param AnalysisResultValidator $validator
     */
    public function __construct(AnalysisResultRepository $repository, AnalysisResultValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $analysisResults = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $analysisResults,
            ]);
        }

        return view('analysisResults.index', compact('analysisResults'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AnalysisResultCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(AnalysisResultCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $analysisResult = $this->repository->create($request->all());

            $response = [
                'message' => 'AnalysisResult created.',
                'data'    => $analysisResult->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $analysisResult = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $analysisResult,
            ]);
        }

        return view('analysisResults.show', compact('analysisResult'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $analysisResult = $this->repository->find($id);

        return view('analysisResults.edit', compact('analysisResult'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AnalysisResultUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(AnalysisResultUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $analysisResult = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'AnalysisResult updated.',
                'data'    => $analysisResult->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'AnalysisResult deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'AnalysisResult deleted.');
    }
}
