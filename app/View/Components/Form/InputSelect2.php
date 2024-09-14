<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSelect2 extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $label,
        public $collection,
        public $name,
        public $value = null,
        public $mask = null,
        public $id = "",

        public $itemId = "id",
        public $itemName = "nome",
    ){}
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input-select2');
    }
}
