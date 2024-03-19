@section('page_title', 'Create New Transaction')
<x-app-layout>
    <x-page-heading :title="'Create New Transaction'" />

    <x-content-wrap class="max-w-3xl">
        <h2 class="h2">Transaction Details</h2>

        <form action="{{ route('transactions.create') }}" method="POST">
            @csrf

        </form>
    </x-content-wrap>
</x-app-layout>
