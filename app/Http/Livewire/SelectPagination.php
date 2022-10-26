<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SelectPagination extends Component
{
    public $options;
    public $perPage;

    public function mount()
    {
        $this->options = [10, 15, 20];
        $this->perPage = $this->options[0];
    }

    public function updatedPerPage()
    {
        $this->emit('perPageUpdated', $this->perPage);
    }

    public function render()
    {
        return view('livewire.select-pagination');
    }
}
