<?php

namespace App\Http\Middleware;

use App\Models\ApiKey;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $xApiKey = $request->header('x_api_key');

        if(!$xApiKey){
            return response()->json(['message'=>'no api key'],401);
        }

        $apiKey = ApiKey::where('key', $xApiKey)->first();

        if(!$apiKey){
            return response()->json(['message'=>'bad api key'],403);
        }
        $user = $apiKey->user;
        $request->merge(['user' => $user]);

        return $next($request);
    }
}
