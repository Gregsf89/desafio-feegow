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
     *     path="/api/v1/documentation",
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

    /**
     * @OA\Get(
     *  path="/api/v1/commands/db-mass-populate/funcQnt/{func}/loteQnt/{lote}/doseQnt/dose",
     *  parameters={{
     *      "name": "func",
     *      "in": "path",
     *      "description": "quantity of Funcionarios to be created",
     *      "required": true,
     *      "schema": {
     *      "type": "int"
     *  }}},
     *  parameters={{
     *      "name": "lote",
     *      "in": "path",
     *      "description": "quantity of Lotes to be created",
     *      "required": true,
     *      "schema": {
     *      "type": "int"
     *  }}},
     *  parameters={{
     *      "name": "dose",
     *      "in": "path",
     *      "description": "quantity of Doses to be created",
     *      "required": true,
     *      "schema": {
     *      "type": "int"
     *  }}},
     *  summary="GET Command db::mass-populate",
     *  description="populates db with random data",
     *  operationId="commands.db-mass-populate",
     *  tags={"Commands"},
     *  security={{"default": {}}},
     *  @OA\Response(
     *      response=200,
     *      description="Command Response Body Data",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              @OA\Property(property="data", type="null", example=null),
     *              @OA\Property(property="error", type="null", example=null)
     *          )
     *      )
     *  ))
     */
    private static $placeholder;
}
