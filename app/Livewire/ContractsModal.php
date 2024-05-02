<?php

namespace App\Livewire;

use App\Models\Unit;
use App\Models\Boarder;
use App\Models\LeaseAgreement;
use Illuminate\Contracts\View\View;
use App\Livewire\Forms\ContractForm;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;

class ContractsModal extends ModalComponent
{
    use WithFileUploads;
    
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
        if($this->contract && $this->contract->exists) {
            $this->form->setContract($this->contract);
            $this->getRooms($this->contract->unit_id);
            $this->heading = 'Edit';
        } else {
            $this->heading = 'Add';
            $this->boarder = $boarder;
        }

        $this->units = Unit::unitType('boarding')->get();
        
    }

    public function download()
    {
        return response()->download( 
            asset('images/' . $this->contract->contract_document)
        );
        // dd(asset('images/' . $this->contract->contract_document));
    }

    public function processContract()
    {
        $this->form->save($this->boarder);
        $this->closeModal();
        $this->dispatch('refresh-list');

        // $modelClass = Str::plural(strtolower($this->noteableType));
        // return redirect()->route($modelClass . '.show', $this->noteableId)->with('success', "Successfully {$this->heading}ed note.");
    }

    public function render(): View
    {
        return view('livewire.contracts-form');
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
