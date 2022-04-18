<div
    {{ $attributes->merge(['class' => 'card pb-2 bg-gray-100 shadow dark:bg-gray-700 dark:shadow-white rounded dark:text-white']) }}>
    <div class="card-title bg-blue-600 dark:bg-gray-900 p-2 text-white rounded">
        <h2 class="text-lg font-semibold capitalize">{{ $title }}</h2>
    </div>
    <div class="p-1 card-body bg-transparent">
        {{ $slot }}
    </div>
</div>
