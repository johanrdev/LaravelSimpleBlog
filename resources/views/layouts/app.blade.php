<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-slate-200 flex flex-col">
            @include('layouts.navigation')

            <!-- Page Heading -->
            {{-- <header class="bg-teal-600 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header> --}}

            <!-- Page Content -->
            <main class="grow">
                {{ $slot }}
            </main>

            <footer class="bg-slate-300 flex flex-col">
                <div class="max-w-7xl mx-auto w-full">
                    {{-- <div class="grid grid-cols-3 gap-6 h-80">
                        <div class="p-6">Col 1</div>
                        <div class="p-6">Col 2</div>
                        <div class="p-6">Col 3</div>
                    </div> --}}
                    <p class="p-6 text-center text-slate-400 font-bold text-lg uppercase">&copy; Copyright {{ date('Y') }}</p>
                </div>
            </footer>
        </div>
    </body>
</html>
