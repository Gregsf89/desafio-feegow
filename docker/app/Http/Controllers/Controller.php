<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * @OA\Info(
 *    title="Feegow Technical Test API Documentation",
 *    version="1.0.0",
 * ),
 * @OA\SecurityScheme(
 *      securityScheme="default",
 *      in="header",
 *      name="Authorization",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT"
 * )
 */
abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @OA\Get(
     *     path="/api/documentation",
     *     @OA\Response(response="200", description="base docs endpoint")
     * )
     */
    public $customMessages = [
        'required' => 'required_field',
        'required_without_all' => 'at_least_one_field_required',
        'array' => 'invalid_value',
        'regex' => 'invalid_value',
        'int' => 'invalid_integer',
        'integer' => 'invalid_integer',
        'numeric' => 'invalid_number',
        'min' => 'invalid_min_value',
        'date' => 'invalid_date',
        'date_format' => 'invalid_date_format',
        'in' => 'invalid_value',
        'exists' => 'invalid_value',
        'max' => 'invalid_max_value',
        'after_or_equal' => 'invalid_after_value',
        'between' => 'invalid_between_value',
        'file' => 'invalid_file',
        'mimetypes' => 'invalid_format',
        'unique' => 'value_not_unique'
    ];
}
