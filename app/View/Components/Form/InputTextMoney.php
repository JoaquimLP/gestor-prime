<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputTextMoney extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $label,
        public $name,
        public $placeholder,
        public $value = null,
        public $mask = null,
        public $id = "",
        public $wireInput = null,
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input-text-money');
    }
}
