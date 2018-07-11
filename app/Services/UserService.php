<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\Traits\CrudMethods;
use Illuminate\Support\Facades\Auth;
use Zend\Diactoros\Request;

/**
 * Class BankAccountService
 * @package App\Services
 */
class UserService extends AppService
{
    use CrudMethods;

    /**
     * @var UserRepository
     */
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function userData($request){
        $user = Auth::user();

        $data['id'] = $user->id;
        $data['type_user'] = $user->type_user;
        $data['name'] = $user->name;
        $data['email'] = $user->email;
        $data['ip'] = $request->getClientIp();

        return $data;
    }
}