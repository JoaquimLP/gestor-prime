<?php

namespace App\Rules;

use App\Models\Admin\Configuracao\Empresa;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueCnpj implements ValidationRule
{

    public function __construct(
        protected $ignore = null
    )
    {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail, ): void
    {
        $cnpj = preg_replace("/[^0-9]/", "", $value);
        $hasEmpresa = Empresa::where('cnpj', preg_replace("/[^0-9]/", "", $cnpj))->where('ativo', 'S');
        if(!empty($this->ignore)) {
            $hasEmpresa = $hasEmpresa->whereNotIn('id', [$this->ignore]);
        }

        $hasEmpresa = $hasEmpresa->count();

        if ($hasEmpresa > 0) {
            $fail('O campo :attribute já está sendo utilizado.');
        }
    }
}
