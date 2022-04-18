@props([
    'icon' => null
])

<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    @isset($icon)
        <i class='mx-1 fas' :class="busy ? 'fa-spin fa-redo' : 'fa-{{$icon}}'"></i> 
    @endisset
    {{ $slot }}
</button>
