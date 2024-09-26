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
        $response = $next($request);

        $body = [
            'status_code' => $response->getStatusCode(),
            'message' => \Symfony\Component\HttpFoundation\Response::$statusTexts[$response->getStatusCode()],
            'data' => null,
            'error' => null
        ];

        if (isset($response->getOriginalContent()['error']))
            $body['error'] = $response->getOriginalContent()['error'];
        else
            $body['data'] = $response->getOriginalContent();

        return response()->json($body, $response->getStatusCode());
    }
}
