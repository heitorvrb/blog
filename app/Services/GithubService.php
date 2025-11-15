<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class GithubService
{
    private string $username;
    private string $repo;
    private string $token;
    private string $locale;

    public function __construct()
    {
        $config = config('github');
        $this->username = $config['username'];
        $this->repo = $config['repo'];
        $this->token = $config['token'];
        $this->locale = App::getLocale();
    }

    public function getPosts(): Collection
    {
        $posts = Http::withHeaders([
            'Authorization' => "token {$this->token}",
            'Accept' => 'application/vnd.github.v3+json',
        ])->get("https://api.github.com/repos/{$this->username}/{$this->repo}/contents/{$this->locale}")
            ->throw()
            ->collect();

        return $posts;
    }

    public function getPostBySlug(string $slug)
    {
        $post = Http::withHeaders([
            'Authorization' => "token {$this->token}",
            'Accept' => 'application/vnd.github.v3+json',
        ])->get("https://api.github.com/repos/{$this->username}/{$this->repo}/contents/{$this->locale}/{$slug}")
            ->throw()
            ->object();

        return $post;
    }
}
