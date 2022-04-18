@props([
    'name',
    'label',
    'type' => 'text',
    'ph' => '',
    'req' => false,
    'errorMessage' => null
    ])

    <div class="flex flex-wrap items-baseline">
        @isset($label)
            <label
                class="w-full mb-2 text-xs font-bold tracking-wide text-center text-gray-200 uppercase sm:w-2/12 dark:text-gray-200"
                for="form-{{ $name }}">{{ $label }}
            </label>
        @endisset
        <div class="w-full sm:w-10/12">
            <input
                class="block w-full px-4 py-3 mb-3 leading-tight text-gray-800 bg-gray-200 border rounded appearance-none dark:text-gray-200 dark:bg-gray-500 dark:focus:bg-gray-600 invalid:border-red-500 focus:outline-none focus:bg-white"
                id="form-{{ $name }}" type="{{ $type }}" name='{{$name}}' placeholder="{{ $ph }}" @if($req)required @endif x-model="{{$name}}" {{$attributes}} />
            <p
                class="block w-full text-xs italic font-semibold text-red-300 dark:text-red-500"
            >
                {{$errorMessage}}
            </p>
        </div>
    </div>
