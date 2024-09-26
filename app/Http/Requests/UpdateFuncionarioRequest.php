<?php

namespace App\Http\Requests;

use App\Rules\ValidateCpf;
use App\Traits\ValidateUrlParams;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFuncionarioRequest extends FormRequest
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
                new ValidateCpf()
            ],
            'nome' => 'required|string|regex:/\w+(?: \w+)+/',
            'data_nascimento' => 'required|date_format:Y-m-d|before:' . Carbon::now()->subYears(18)->format('Y-m-d'),
            'comorbidade_ids' => 'nullable|array',
            'comorbidade_ids.*' => 'nullable|integer|exists:comorbidades,id',
            'doses_vacina_info' => 'nullable|array|max:3',
            'doses_vacina_info.*.lote_vacina_info' => 'nullable|array',
            'doses_vacina_info.*.lote_vacina_info.id' => 'nullable|ulid|exists:lote_vacinas,id',
            'doses_vacina_info.*.lote_vacina_info.tipo_vacina_id' => 'nullable|integer|exists:tipo_vacinas,id',
            'doses_vacina_info.*.lote_vacina_info.data_validade' => 'nullable|date_format:Y-m-d',
            'doses_vacina_info.*.lote_vacina_info.lote' => 'nullable|string',
            'doses_vacina_info.*.lote_vacina_info.dose_unica' => 'nullable|boolean',
            'doses_vacina_info.*.lote' => 'nullable|string|unique:lote_vacinas,lote',
            'doses_vacina_info.*.dose' => 'nullable|numeric|in:1,2,3',
            'doses_vacina_info.*.data_aplicacao' => 'nullable|date_format:Y-m-d|before_or_equal:' . Carbon::now()->format('Y-m-d')
        ];
    }
}
