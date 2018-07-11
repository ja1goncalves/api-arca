<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Http\Controllers\Traits\CrudMethods;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends Controller
{

    use CrudMethods;

    /**
     * @var UserValidator
     */
    protected $validator;

    /**
     * @var UserService
     */
    protected $service;

    /**
     * UsersController constructor.
     * @param UserService $service
     * @param UserValidator $validator
     */
    public function __construct(UserValidator $validator, UserService $service)
    {
        $this->validator  = $validator;
        $this->service = $service;
    }

    public function userData(Request $request){
        return response()->json($this->service->userData($request));
    }

}
