<?php

namespace App\Http\Requests\Configuracao\Usuario;

use App\Rules\HasEmailUser;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $id = $this->user->id ?? null;

        return [
            "name" => ["sometimes", "required"],
            "celular" => ["sometimes", "required"],
            "email" => ["sometimes", "required", new HasEmailUser($id)],
            "data_nascimento" => ["sometimes", "nullable"],
            "empresa_id" => ["sometimes", "required"],
            'password' => ["sometimes", 'nullable', 'confirmed'],
        ];
    }
}
