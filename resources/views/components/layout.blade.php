<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] flex flex-1 p-8 min-h-screen">
    {{--
    <header class="w-full g:max-w-4xl max-w-[335px] text-sm mb-6">
        <nav class="flex items-center justify-end gap-4">
            <a href="{{ url('/dashboard') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                Dashboard
            </a>
        </nav>
    </header>
    --}}
    <main
        class="flex flex-col items-center justify-center w-full transition-opacity opacity-100 duration-750 grow starting:opacity-0">
        {{ $slot }}
    </main>

</html>
