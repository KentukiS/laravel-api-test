<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\DB;

class AuthenticateApi extends Middleware
{
   protected function authenticate($request, array $guards)
   {
        $token = $request->query('api_token');
        if(empty($token)){
            $token = $request->input('api_token');
        }
        if(empty($token)){
            $token = $request->bearerToken();
        }

        if($token === config('apitokens')[0]) return;

        $userTokens = DB::table('users')->pluck('api_token');
        foreach ($userTokens as $userToken) {
            if($userToken === $token) return;
        }

        $this->unauthenticated($request, $guards);
   }
}
