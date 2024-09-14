<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableComponent2 extends Component
{
    public $resource;
    public array $columns;
    public array $routes;


    /**
     * Create a new component instance.
     */
    public function __construct($resource, $columns, $routes = [])
    {
        $this->resource = $resource;
        $this->columns = $columns;
        $this->routes = $routes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table-component2');
    }
}
