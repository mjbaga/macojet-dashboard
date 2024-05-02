<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Boarder;
use App\Models\LeaseAgreement;
use Livewire\Attributes\Validate;

class ContractForm extends Form
{
    public ?LeaseAgreement $contract = null;
    public int $unit_id;
    public int $room_id;
    public string $start_date;
    public string $end_date;
    public float $agreed_payment;
    public string $terms_of_payment;
    public $contract_document;
    public bool $includes_city_services;
    public int $months_deposit;
    public float $deposit_amount;
    public bool $deposit_refunded = false;
    public bool $will_renew = false;
    public bool $active = false;

    public function rules(): array
    {
        return [
            'unit_id' => ['required', 'integer'],
            'room_id' => ['required', 'integer'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'agreed_payment' => ['required', 'numeric'],
            'terms_of_payment' => ['required', 'string'],
            'contract_document' => ['mimes:pdf,doc,docx', 'nullable'],
            'includes_city_services' => ['required', 'boolean'],
            'months_deposit' => ['required', 'integer'],
            'deposit_amount' => ['required', 'numeric'],
            'deposit_refunded' => ['boolean'],
            'will_renew' => ['boolean'],
            'active' => ['boolean'],
        ];
    }

    public function save(Boarder $boarder): void
    {
        $this->validate();
        
        if($this->contract_document) {
            $this->contract_document->store('contracts', 'private');
        }

        if(!$this->contract) {
            $boarder->contracts()->create($this->all());
        } else {
            $this->contract->update($this->all());
        }
    }

    public function setContract(?LeaseAgreement $contract)
    {
        $this->contract = $contract;
        $this->unit_id = $contract->unit_id;
        $this->room_id = $contract->room_id;
        $this->start_date = $contract->start_date;
        $this->end_date = $contract->end_date;
        $this->agreed_payment = $contract->agreed_payment;
        $this->terms_of_payment = $contract->terms_of_payment;
        $this->contract_document = $contract->contract_document;
        $this->includes_city_services = $contract->includes_city_services;
        $this->months_deposit = $contract->months_deposit;
        $this->deposit_amount = $contract->deposit_amount;
        $this->deposit_refunded = $contract->deposit_refunded;
        $this->will_renew = $contract->will_renew;
        $this->active = $contract->active;
    }
}
