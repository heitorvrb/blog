<x-layout>

    <div class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
        <div
            class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
            <h1 class="mb-6 font-medium text-2xl">Heitor's Blog</h1>
            <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">{{ __('messages.latest-posts') }}:</p>

            <ul class="mt-6 space-y-4">
                @foreach ($posts as $post)
                    <li class="border-b pb-2">
                        <a href="{{ route('post', ['locale' => app()->getLocale(), 'slug' => $post['slug']]) }}"
                            class="text-lg font-semibold hover:underline">
                            {{ $post['title'] }}
                        </a>
                        <div class="text-xs text-gray-500 dark:text-gray-400">
                            {{ app()->getLocale() === 'pt'
                                ? $post['date']->locale('pt')->isoFormat('DD MMM YYYY')
                                : $post['date']->isoFormat('MMM D, YYYY') }}
                        </div>
                        <p class="mt-1 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                            {{ Str::limit($post['name'], 100) }}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</x-layout>
