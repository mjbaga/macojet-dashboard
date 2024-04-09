<a href="{{ $href }}" {{ $attributes->merge(['class' => 'btn btn-dark', 'title' => $title]) }}>
    {{ $slot }}
</a>
