<x-layout>
    <div class="max-w-3xl lg:max-w-4xl flex flex-col gap-6">
        <article class="prose dark:prose-invert max-w-none">
            {!! $html !!}
        </article>
        <a href="{{ "https://github.com/{$github_username}/{$blog_posts_repo}/edit/main/" . app()->getLocale() . "/" . request()->route('slug') }}"
            target="_blank" rel="noopener noreferrer" class="dark:text-white text-center">
            {{ __('messages.suggest-a-correction') }}
        </a>
    </div>
</x-layout>
