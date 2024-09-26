<?php

namespace App\Http\Requests;

use App\Rules\ValidateCpf;
use Illuminate\Foundation\Http\FormRequest;

class GetFuncionarioRequest extends FormRequest
{
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

    /**
     * Get data to be validated from the request. From Route URL
     *
     * @return array
     */
    public function validationData(): array
    {
        if (method_exists($this->route(), 'parameters')) {
            $this->request->add($this->route()->parameters());
            $this->query->add($this->route()->parameters());

            return array_merge($this->route()->parameters(), $this->all());
        }

        return $this->all();
    }
}
