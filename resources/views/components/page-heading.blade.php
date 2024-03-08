<x-slot name="header">
    <div class="flex justify-between">
        <div class="left">
            @if (Breadcrumbs::has())
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2 flex gap-2">
                        <x-tabuna-breadcrumbs class="breadcrumb-item" active="active" />
                    </ol>
                </nav>
            @endif
            <h2 class="section-heading">
                {{ $title }}
            </h2>
        </div>
        @if ($actions)
            <div class="actions">
                @foreach ($actions as $link)
                    <x-link-button :href="route($link['href'])">
                        {{ $link['title'] }}
                    </x-link-button>
                @endforeach
            </div>
        @endif
    </div>
</x-slot>
