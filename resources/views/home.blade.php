<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6">
        {{--
        <nav class="flex items-center justify-end gap-4">
            <a href="{{ url('/dashboard') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                Dashboard
            </a>
        </nav>
        --}}
    </header>
    <div
        class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
            <div
                class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
                <h1 class="mb-6 font-medium text-2xl">Heitor's Blog</h1>
                <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">Latest posts:</p>

                <ul class="mt-6 space-y-4">
                    @foreach ($posts as $post)
                        <li class="border-b pb-2">
                            <a href="{{ url('slug') }}" class="text-lg font-semibold hover:underline">
                                {{ $post['title'] }}
                            </a>
                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                {{ $post['date']->format('M d, Y') }}
                            </div>
                            <p class="mt-1 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                {{ Str::limit($post['name'], 100) }}
                            </p>
                        </li>
                    @endforeach
                </ul>

</html>
