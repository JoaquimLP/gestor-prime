<?php

namespace App\Http\Requests\Configuracao\Empresa;

use App\Rules\UniqueCnpj;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmpresaRequest extends FormRequest
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
        $id = $this->empresa->id ?? null;

        return [
            "razao_social" => ["required", "min:3", "max:120"],
            "nome" => ["required", "min:3", "max:120"],
            "cnpj" => ["required", "max:18", new UniqueCnpj($id)],
            "celular" => ["required", "max:16"],
            "email" => ["required", "email"],
            "ie" => ["required", "max:16"],
            "cep" => ["required", "max:9"],
            "uf" => ["required", "max:2"],
            "cidade_desc" => ["required", "max:70"],
            "bairro_desc" => ["required", "max:70"],
            "logradouro" => ["required", "max:250"],
            "numero" => ["required"],
            "complemento" => ["nullable"],
            "logo" => ["nullable"],
        ];
    }
}
