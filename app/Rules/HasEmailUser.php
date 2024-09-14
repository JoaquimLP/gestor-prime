<?php

namespace App\Rules;

use App\Models\Admin\Configuracao\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class HasEmailUser implements ValidationRule
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
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $hasUser = User::where('email', $value)->where('ativo', 'S');
        if(!empty($this->ignore)) {
            $hasUser = $hasUser->whereNotIn('id', [$this->ignore]);
        }

        $hasUser = $hasUser->count();

        if ($hasUser > 0) {
            $fail('O campo :attribute já está sendo utilizado.');
        }
    }
}
