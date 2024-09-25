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
            'message' => \Symfony\Component\HttpFoundation\Response::$statusTexts[$response->getStatusCode()],
            'data' => null,
            'error' => null
        ];

        if ($response->getOriginalContent()['error'])
            $return['error'] = $response->getOriginalContent()['error'];
        else
            $return['data'] = $response->getOriginalContent();

        return response()->json($return, $response->getStatusCode());
    }
}
