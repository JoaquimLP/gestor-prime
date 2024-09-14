<?php

namespace App\View\Components\Contrato;

use App\Service\Contrato\ContratoService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContratoComponent extends Component
{
    public $txtContrato;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $documento,
        public $medico
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->txtContrato = (new ContratoService($this->documento, $this->medico))->convertContrato();
        return view('components.contrato.contrato-component');
    }
}
