<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLoteVacinaRequest extends FormRequest
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
            'tipo_vacina_id' => 'required|integer|exists:tipo_vacinas,id',
            'data_validade' => 'required|date_format:Y-m-d',
            'lote' => 'required|string|between:1,10',
            'dose_unica' => 'required|boolean'
        ];
    }
}
