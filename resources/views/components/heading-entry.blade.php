<div class="bg-gray-400 text-white font-bold py-4 px-4 grid grid-cols-{{ count($headings) }} gap-2">
    @foreach ($headings as $heading)
        <div>
            {{ $heading }}
        </div>
    @endforeach
</div>
