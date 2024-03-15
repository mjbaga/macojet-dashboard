<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaseAgreementRequest;
use App\Models\Boarder;
use App\Models\LeaseAgreement;
use App\Models\Unit;
use Illuminate\Http\Request;

class LeaseAgreementController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Boarder $boarder)
    {
        $units = Unit::boardingType('boarding')->get();
        
        return view('boarders.contracts.create', [
            'boarder' => $boarder,
            'units' => $units
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeaseAgreementRequest $request, Boarder $boarder)
    {
        $data = $request->validated();

        $file = $request->file('contract_doc');

        $validatedData = [...$data];
        $validatedData['includes_city_services'] = $request->has('includes_city_services');

        if($file) {
            $path = $file->store('contracts', 'private');
            $validatedData['contract_document'] = $path;
        }

        $boarder->contracts()->create($validatedData);

        return redirect()->route('boarders.show', $boarder)
            ->with('success', 'Successfully created new lease contract.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boarder $boarder, LeaseAgreement $contract)
    {
        $units = Unit::boardingType('boarding')->get();

        return view('boarders.contracts.edit', [
            'boarder' => $boarder,
            'contract' => $contract,
            'units' => $units
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeaseAgreementRequest $request, Boarder $boarder, LeaseAgreement $contract)
    {
        $data = $request->validated();

        $file = $request->file('contract_doc');

        $validatedData = [...$data];
        $validatedData['will_renew'] = $request->has('will_renew');
        $validatedData['deposit_refunded'] = $request->has('deposit_refunded');
        $validatedData['includes_city_services'] = $request->has('includes_city_services');

        if($file) {
            $path = $file->store('contracts', 'private');
            $validatedData['contract_document'] = $path;
        }

        $contract->update($validatedData);

        return redirect()->route('boarders.show', $boarder)
            ->with('success', 'Successfully update lease contract.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
