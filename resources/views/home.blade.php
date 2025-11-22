<x-layout>

    <div class="w-full lg:max-w-4xl">
        <div
            class="p-6 pb-12 lg:p-20 rounded-lg bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
            <h1 class="mb-6 text-2xl">Heitor's Blog</h1>
            <p class="mb-4 text-[13px] text-gray-500 dark:text-gray-400">{{ __('messages.latest-posts') }}:</p>
            <ul class="space-y-4">
                @foreach ($posts as $post)
                    <li class="flex flex-col gap-1 border-b pb-2">
                        <a href="{{ route('post', ['locale' => app()->getLocale(), 'slug' => $post['slug']]) }}"
                            class="text-lg font-semibold hover:underline">
                            {{ $post['title'] }}
                        </a>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            {{ Str::limit($post['subtitle'], 100) }}
                        </p>
                        <div class="text-xs text-gray-500 dark:text-gray-400">
                            {{ app()->getLocale() === 'pt'
                                ? $post['date']->locale('pt')->isoFormat('DD MMM YYYY')
                                : $post['date']->isoFormat('MMM D, YYYY') }}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</x-layout>
