<?php

namespace App\Http\Middleware;

use Closure;
use Auth0\SDK\Auth0;

class CheckAccess
{
    public function handle($request, Closure $next)
    {

        // https://auth0.com/docs/quickstart/backend/laravel/01-authorization#configure-auth0-apis
        $accessToken = $request->bearerToken();

        if (empty($accessToken)) {
            return response()->json(['message' => 'Bearer token missing'], 401);
        }

        $authConfig = [
            'domain' => config('auth0.domain'),
            'client_id' => config('auth0.client_id'),
            'client_secret' => config('auth0.client_secret'),
            'redirect_uri' => config('auth0.redirect_uri')
        ];

        try {
            $auth0 = new Auth0($authConfig);
            $decodedToken = $auth0->decodeIdToken($accessToken);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }

        return $next($request);

    }
}
