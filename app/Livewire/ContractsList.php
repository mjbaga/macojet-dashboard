<?php

namespace App\Livewire;

use App\Models\Boarder;
use Livewire\Component;

class ContractsList extends Component
{
    public Boarder $boarder;
    public $contracts;

    public function mount(Boarder $boarder)
    {
        $this->boarder = $boarder;
        $this->contracts = $boarder->contracts()->orderBy('start_date', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.contracts-list');
    }
}
