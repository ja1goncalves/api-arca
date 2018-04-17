<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SearchCreateRequest;
use App\Http\Requests\SearchUpdateRequest;
use App\Repositories\SearchRepository;
use App\Validators\SearchValidator;

/**
 * Class SearchesController.
 *
 * @package namespace App\Http\Controllers;
 */
class SearchesController extends Controller
{
    /**
     * @var SearchRepository
     */
    protected $repository;

    /**
     * @var SearchValidator
     */
    protected $validator;

    /**
     * SearchesController constructor.
     *
     * @param SearchRepository $repository
     * @param SearchValidator $validator
     */
    public function __construct(SearchRepository $repository, SearchValidator $validator)
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
        $searches = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $searches,
            ]);
        }

        return view('searches.index', compact('searches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SearchCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(SearchCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $search = $this->repository->create($request->all());

            $response = [
                'message' => 'Search created.',
                'data'    => $search->toArray(),
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
        $search = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $search,
            ]);
        }

        return view('searches.show', compact('search'));
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
        $search = $this->repository->find($id);

        return view('searches.edit', compact('search'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SearchUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(SearchUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $search = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Search updated.',
                'data'    => $search->toArray(),
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
                'message' => 'Search deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Search deleted.');
    }
}
