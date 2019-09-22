<?php

namespace App\GraphQL\Queries;

use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Auth as userAuth;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class Auth
{

    public function login($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo) {
       $data = array(
           "email" => $args['input']['email'],
            "password" =>  $args['input']['password'],
       );
        if ($token = auth()->attempt($data))
            return $this->respondWithToken($token, auth()->user());

//        $token = auth()->attempt($data);
//        return $this->respondWithToken($token, auth()->user());
        return "Error";
    }

    public function logout($rootValue, array $args) {
        if(! userAuth::user()) {
            return "already logged out";
        }
        userAuth::logout();
        return "LoggedOut";
    }

    protected function respondWithToken($token, $user)
    {
        return collect([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => $user
        ]);
    }

}









