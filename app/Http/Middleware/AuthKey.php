<?php

namespace App\Http\Middleware;

use Closure;

class AuthKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('API-KEY');

        if ($token != 'ABCD') {
            return response()->json(['message' => 'API Key not found'], 401); // 401 => Unathorize
        }

        return $next($request);
    }
}
