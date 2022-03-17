<!DOCTYPE html>
<html x-data="{darkMode: $persist(false)}"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}"
    :class="{'dark': darkMode}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <style>
        x-cloak {
            display: none;
        }

        img:not([src]):not([srcset]) {
            visibility: hidden;
        }
    </style>
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    @include('layouts.guest-nav')
    <div class="font-sans antialiased text-gray-900">
        {{ $slot }}
    </div>
</body>

</html>
