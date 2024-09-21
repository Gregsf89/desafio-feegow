<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ApiResponse
{
    /**
     * Handle an incoming request.
     * @param Request $request
     * @param Closure $next
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next): JsonResponse
    {
        $return = [
            'data' => null,
            'error' => null
        ];

        $response = $next($request);

        if (!empty($response->original['code']) && isset($response->original['message']))
            $return['error'] = $response->original;
        else if (!empty($response->original['error']['code']) && isset($response->original['error']['message']))
            $return['error'] = $response->original['error'];
        else
            $return['data'] = $response->original;

        return response()->json($return, $response->getStatusCode());
    }
}
