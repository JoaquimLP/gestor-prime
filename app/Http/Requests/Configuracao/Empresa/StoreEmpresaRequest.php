<?php

namespace App\Http\Requests\Configuracao\Empresa;

use App\Models\Admin\Configuracao\Empresa;
use App\Rules\HasEmailUser;
use App\Rules\UniqueCnpj;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmpresaRequest extends FormRequest
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
            "razao_social" => ["required", "min:3", "max:120"],
            "nome" => ["required", "min:3", "max:120"],
            "cnpj" => ["required", "max:18", new UniqueCnpj()],
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
            "logo" => ["required"],
            "qtd" => ["sometimes", "required"],
            "nome_resp" => ["sometimes", "required"],
            "celular_resp" => ["sometimes", "required"],
            "email_resp" => ["sometimes", "required", new HasEmailUser()],
            "data_nascimento_resp" => ["sometimes", "nullable"],
            'password' => ["sometimes", 'required', 'confirmed'],
        ];
    }
}
