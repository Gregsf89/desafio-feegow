<?php

namespace App\Http\Requests;

use App\Rules\ValidateCpf;
use App\Traits\ValidateUrlParams;
use Illuminate\Foundation\Http\FormRequest;

class GetFuncionarioRequest extends FormRequest
{
    use ValidateUrlParams;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cpf' => [
                'required',
                'string',
                'size:11',
                'exists:funcionarios,cpf',
                new ValidateCpf()
            ]
        ];
    }
}
