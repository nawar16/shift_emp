<?php

namespace App\Interfaces;

interface AuthInterface{

    public function register(array $request);

    public function login(array $request);

}


?>