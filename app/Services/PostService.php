<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class PostService
{
    public function __construct(
        private GithubService $githubService,
    ) {}

    public function getPosts(): Collection
    {
        $posts = $this->githubService->getPosts()
            ->map(function ($item) {
                return [
                    'title' => $this->getMarkdownTitle($item['download_url']),
                    'subtitle' => $this->getMarkdownSubtitle($item['download_url']),
                    'date' => $this->getPostDate($item['name']),
                    'name' => $this->getPostName($item['name']),
                    'slug' => $item['name'],
                    'download_url' => $item['download_url'],
                ];
            })
            ->sortByDesc('date');

        return $posts;
    }

    public function getPostBySlug(string $slug)
    {
        $post = $this->githubService->getPostBySlug($slug);
        return $post;
    }

    private function getStartOfFile(string $download_url): string
    {
        return Cache::remember(
            "start_of_file_{$download_url}",
            10,
            fn() => Http::withHeaders([
                'Range' => 'bytes=0-128', // first 128 bytes
            ])->get($download_url)
                ->throw()
                ->body()
        );
    }

    private function getMarkdownTitle(string $download_url): string
    {
        $start_of_file = $this->getStartOfFile($download_url);

        preg_match('/^# (.+?)\n/', $start_of_file, $matches);

        return $matches[1] ?? 'Untitled';
    }

    private function getMarkdownSubtitle(string $download_url): ?string
    {
        $start_of_file = $this->getStartOfFile($download_url);

        preg_match('/^### (.+?)\n/m', $start_of_file, $matches);

        return $matches[1] ?? null;
    }

    private function getPostDate(string $filename): Carbon
    {
        return Carbon::createFromFormat('Y-m-d', substr($filename, 0, 10));
    }

    private function getPostName(string $filename): string
    {
        return substr($filename, 11);
    }
}
