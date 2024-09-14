<?php

namespace App\Http\Requests\Cadastro\Medico;

use Illuminate\Foundation\Http\FormRequest;

class ContratoRequest extends FormRequest
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
            "descricao" => ["nullable"],
            "especialidade_id" => ["required"],
            "unidade_atendimento_id" => ["required"],
            "start_date" => ["required"],
            "end_date" => ["required"],
            "clausula_adicional" => ["nullable"],
        ];
    }
}
