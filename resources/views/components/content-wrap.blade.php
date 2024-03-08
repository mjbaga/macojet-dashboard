<div {!! $attributes->merge([
    'class' => 'py-12 mx-auto bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg',
]) !!}>
    <div class="sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
        {{ $slot }}
    </div>
</div>
