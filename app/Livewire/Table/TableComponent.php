<?php

namespace App\Livewire\Table;

use Livewire\Component;
use Livewire\WithPagination;

class TableComponent extends Component
{
    use WithPagination;

    public $resource;
    public string $include;
    public string $title;
    public bool $hasEmpresa = false;
    public $showItem = null;
    public array $columns;
    public array $routes;
    public bool $modalOpen = false;
    public $hasShow = true;

    protected $listeners = ['close' => 'close'];

    public function show($id)
    {
        $this->showItem = app("App\Models\\" . $this->resource)->find($id);
        $this->modalOpen = true;
        //dd($id);
    }

    public function close()
    {
        $this->showItem = null;
        $this->modalOpen = false;
    }

    public function render()
    {
        $collect = app("App\Models\\" . $this->resource)->where("ativo", "S");

        if($this->hasEmpresa) {
            $collect = $collect->empresa();
        }

        return view('livewire.table.table-component', [
            'collect' => $collect->paginate(10),
        ]);
    }
}
