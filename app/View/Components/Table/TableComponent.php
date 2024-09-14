<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use PhpParser\ErrorHandler\Collecting;

class TableComponent extends Component
{

    public $resource;
    public array $columns;
    public array $routes;
    public string | null $delete;

    // public function render()
    // {
    //     return view('livewire.table', [
    //         'items' => app("App\Models\\" . $this->resource)->paginate(10)
    //     ]);
    // }

    /**
     * Create a new component instance.
     */
    public function __construct($resource, $columns, $routes = [], $delete = null)
    {
        $this->resource = $resource;
        $this->columns = $columns;
        $this->routes = $routes;
        $this->delete = $delete;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table-component');
    }
}
