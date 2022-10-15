<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;

class AuthController extends BaseController
{
    protected $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    /**
     * Create User
     * @param Request $request
     * @return User 
     */
    public function createUser(RegisterRequest $request)
    {
    
        try{

            $data = $this->authService->register($request->all());;
            return $this->sendResponse($data, "Register Successfully");
            
        }catch(Exception $e){
            return $this->sendError($e->getMessage(), [], 500); 
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(LoginRequest $request)
    {
        try{

            $data = $this->authService->login($request->all());;
            
            if($data["code"] == 401){
                return $this->sendError($data["message"], [], $data["code"]);
            }

            return $this->sendResponse($data["data"], "Success");

        }catch(Exception $e){
            
            return $this->sendError($e->getMessage(),[],500); 
        }
        
    }
}