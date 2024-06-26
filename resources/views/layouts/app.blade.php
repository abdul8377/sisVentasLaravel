<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @wireUiScripts
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />
    <x-dialog />
    <!-- https://tailwindcomponents.com/component/dashboard-template/landing -->
    <div>

        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
                class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
            @livewire('dashboard.sidebar')
            <div class="flex flex-col flex-1 overflow-hidden">
                @livewire('dashboard.header')
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="py-8 mx-auto">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </div>
    @stack('modals')
    @stack('js')
    @livewireScripts
</body>

</html>
