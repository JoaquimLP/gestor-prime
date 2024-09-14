<?php

namespace App\Http\Requests\Configuracao\Empresa;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGestaoContratoRequest extends FormRequest
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
            "contratada" => ["required", "min:3", "max:120"],
            "empresa_id" => ["required"],
            "uf" => ["required", "min:2", "max:2"],
            "cidade_desc" => ["required", "min:2", "max:70"],
            "valor_hora" => ["required"],
            "valor_total" => ["required"],
            "qtd_especialista" => ["required",],
            "start_date" => ["required",],
            "end_date" => ["required",],
            "path" => ["nullable"],
        ];
    }
}
