<?php 

namespace App\Repositories;

use App\Interfaces\AuthInterface;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthInterfaceImplementation implements AuthInterface{

    public function register(array $request){

            $user = User::create([
                'name' => $request["name"],
                'email' => $request["email"],
                'password' => Hash::make($request["password"])
            ]);

            return $user->createToken("API TOKEN")->plainTextToken;


    }

    public function login(array $request){

            if(!Auth::attempt(Arr::only($request, ['email', 'password']))){

                $response = [
                    "message" => 'Email & Password does not match with our record.',
                    "code" => 401
                ];
                return $response;
            }

            $user = User::where('email', $request["email"])->first();

            return [
                "data" => $user->createToken("API TOKEN")->plainTextToken,
                "code" => 200
            ];


    }
  

}

?>
