<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-heading-entry :headings="['Name', 'Email', 'Last Updated', 'Actions']" />
                    @forelse ($boarders as $boarder)
                        <x-row-entry :columns="4">
                            <div>{{ $boarder->first_name }} {{ $boarder->last_name }}</div>
                            <div>{{ $boarder->email }}</div>
                            <div>{{ $boarder->updated_at->diffForHumans() }}</div>
                            <div>
                                <button>Edit</button>
                                <button>Delete</button>
                            </div>
                        </x-row-entry>
                    @empty
                        <p>No boarders yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
