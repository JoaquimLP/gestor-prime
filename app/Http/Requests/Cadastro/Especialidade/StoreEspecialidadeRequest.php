<?php

namespace App\Http\Requests\Cadastro\Especialidade;

use Illuminate\Foundation\Http\FormRequest;

class StoreEspecialidadeRequest extends FormRequest
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
            "descricao" => ["nullable", "min:3", "max:250"]
        ];
    }
}
