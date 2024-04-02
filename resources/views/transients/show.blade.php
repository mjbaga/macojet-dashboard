@section('page_title', $transient->fullName)
<x-app-layout>
    <x-page-heading :title="$transient->fullName" />

    <x-content-wrap class="max-w-3xl">
        <h2 class="h2 bg-gray-500 py-2 text-white mt-0">Transient Info</h2>
        <div class="grid grid-cols-3 gap-2 items-start">


            <label>Identification: </label>
            <div class="col-span-2">
                @if ($transient->id_card)
                    <img src="{{ asset('images/' . $transient->id_card) }}" alt="{{ $transient->fullName }}"
                        class="w-full">
                @endif
            </div>

            <label>Gender: </label>
            <div class="col-span-2">
                <p>{{ Str::ucfirst($transient->gender) }}</p>
            </div>

            <label>Date of birth: </label>
            <div class="col-span-2">
                <p>{{ $transient->formatted_date_of_birth }}</p>
            </div>

            <label>Origin Address:</label>
            <div class="col-span-2">{{ $transient->origin_address }}</div>

            <label>Contact Number: </label>
            <div class="col-span-2">
                @if ($transient->contact_number)
                    <a href="tel:{{ $transient->contact_number }}" class="text-slate-500 hover:underline">
                        {{ $transient->contact_number }}
                    </a>
                @else
                    <p>n/a</p>
                @endif
            </div>

            <label>Facebook Account Name: </label>
            <div class="col-span-2">
                <p>{{ $transient->fb_account_name ? $transient->fb_account_name : 'n/a' }}</p>
            </div>
        </div>
    </x-content-wrap>
    <x-content-wrap class="max-w-3xl mt-4">
        <div class="flex justify-between items-center">
            <h2 class="h2 py-2 my-0">Bookings</h2>
            <button type="button" class="button mt-2" data-bs-toggle="modal" data-bs-target="#booking-form">
                New Booking
            </button>
        </div>
        <div class="mt-4">
            <x-entry-heading :headings="['Unit', 'Check In', 'Check Out', 'Number of Pax', 'Actions']" />
            @forelse ($transient->bookings as $booking)
                <x-entry-row :columns="5">
                    <div>{{ $booking->unit->unit_name }}</div>
                    <div>
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $booking->check_in)->toFormattedDateString() }}
                    </div>
                    <div>
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $booking->check_out)->toFormattedDateString() }}
                    </div>
                    <div class="text-center">
                        {{ $booking->number_of_pax }}
                    </div>
                    <div class="justify-self-end">
                        <form action="{{ route('transients.bookings.destroy', [$transient, $booking]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger index-delete-btn" data-bs-toggle="modal"
                                data-bs-target="#delete-modal">
                                Delete
                            </button>
                        </form>
                    </div>
                </x-entry-row>
            @empty
                <div class="grid py-8 place-items-center">
                    <p>No bookings yet.</p>
                </div>
            @endforelse

        </div>
    </x-content-wrap>

    <x-popup-booking :transient="$transient" />
</x-app-layout>
