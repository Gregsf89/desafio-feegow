<?php

namespace App\Http\Middleware;

use App\Http\Helpers\HttpResponse;
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
        $response = $next($request);

        $return = [
            'status_code' => $response->getStatusCode(),
            'message' => HttpResponse::getMessage($response->getStatusCode()),
            'data' => null,
            'error' => null
        ];

        if (!empty($response->original['internal_error_code']) && isset($response->original['internal_message']))
            $return['error'] = $response->original;
        else if (!empty($response->original['error']['code']) && isset($response->original['error']['message']))
            $return['error'] = $response->original['error'];
        else
            $return['data'] = $response->original;

        return response()->json($return, $response->getStatusCode());
    }
}
