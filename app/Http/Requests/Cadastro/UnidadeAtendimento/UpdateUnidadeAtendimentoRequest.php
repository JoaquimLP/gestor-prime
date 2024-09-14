<?php

namespace App\Http\Requests\Cadastro\UnidadeAtendimento;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUnidadeAtendimentoRequest extends FormRequest
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
            "cep" => ["required", "min:3", "max:9"],
            "logradouro" => ["required"],
            "bairro_desc" => ["required"],
            "cidade_desc" => ["required"],
            "uf" => ["required"],
            "numero" => ["required"],
            "complemento" => ["nullable"],
        ];
    }
}
