<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class CheckApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Log::info('CheckApiKey Middleware executed');
        $validApiKey = config('app.valid_api_key');

        if (!$request->has('apikey')) {
            return response()->json(['error' => 'API key is missing'], 400);
        }

        if ($request->query('apikey') !== $validApiKey) {
            return response()->json(['error' => 'Unauthorized, invalid API key'], 401);
        }

        return $next($request);
    }
}
