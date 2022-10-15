<?php

namespace App\Services;
use App\Repositories\AuthInterfaceImplementation;

class AuthService{

    protected $authRepo;

    public function __construct(AuthInterfaceImplementation $authRepo){
        $this->authRepo = $authRepo;
    }


    public function login(array $data){
        
        return $this->authRepo->login($data);
    }

    public function register(array $data){
    
        return $this->authRepo->register($data);
    }

}

?>