<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        api: __DIR__ . '/../routes/api.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(append: [
            \App\Http\Middleware\ApiResponse::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e, \Illuminate\Http\Request $request) {
            if ($request->is('api/*')) {
                $error = [
                    'code' => null,
                    'message' => null,
                    'invalid_inputs' => null
                ];

                $status = 400;
                $error['code'] = !empty($e->getCode()) ? $e->getCode() : 500;
                $status = $error['code'] != 500 ? $status : $error['code'];
                $message = json_decode($e->getMessage(), true);

                if (is_null($message))
                    $message = $e->getMessage();

                if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpExceptionInterface) {
                    $status = $e->getStatusCode();
                    $error['code'] = empty($e->getCode()) ? $e->getStatusCode() : $error['code'];
                    if ($e->getStatusCode() == '404')
                        $message = 'route_not_found';
                }

                if (is_array($message)) {
                    $invalidInputs = [];
                    foreach ($message as $input => $rules) {
                        $invalidInputs[] = [
                            'input' => $input,
                            'rules' => $rules
                        ];
                    }
                    $error['message'] = 'invalid_inputs';
                    $error['invalid_inputs'] = $invalidInputs;
                } else
                    $error['message'] = $message;

                if (config('app.debug', false) === true)
                    $error['trace'] = $e->getTrace();

                if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpExceptionInterface) {
                    $error = [
                        'data' => null,
                        'error' => $error
                    ];
                }

                return response()->json($error, $status);
            } elseif ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException)
                return response()->view('errors.404', [], 404);
        });
    })->create();