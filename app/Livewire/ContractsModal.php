<?php

namespace App\Livewire;

use App\Models\Unit;
use App\Models\Boarder;
use App\Models\LeaseAgreement;
use Illuminate\Contracts\View\View;
use App\Livewire\Forms\ContractForm;
use LivewireUI\Modal\ModalComponent;

class ContractsModal extends ModalComponent
{
    public ContractForm $form;
    public Boarder $boarder;
    public ?LeaseAgreement $contract = null;
    public string $heading = '';
    public $units;
    public $rooms = [];

    public function getRooms($unit_id)
    {
        $unit = Unit::findOrFail($unit_id);
        $this->rooms = $unit->rooms;
    }

    public function mount(Boarder $boarder): void
    {
        $this->boarder = $boarder;
        $this->units = Unit::unitType('boarding')->get();
    }
    public function render(): View
    {
        return view('livewire.contracts-form');
    }
}
