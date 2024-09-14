<?php

namespace App\Http\Requests\Cadastro\Medico;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicoRequest extends FormRequest
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
            "nome" => ["required", "min:3", "max:100"],
            "email" => ["required", "min:3", "max:100"],
            "celular" => ["required", "max:16"],
            "cpf" => ["required", "max:16"],
            "rg" => ["required", "max:16"],
            "crm" => ["required"],
            "rqe" => ["required"],
            "estado_civil" => ["required"],
            "func_public" => ["required"],
            "logradouro" => ["required"],
            "bairro_desc" => ["required"],
            "cidade_desc" => ["required"],
            "uf" => ["required"],
            "numero" => ["required"],
            "complemento" => ["nullable"],
        ];
    }
}
