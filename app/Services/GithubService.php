<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class GithubService
{
    private string $username;
    private string $repo;
    private string $token;

    public function __construct()
    {
        $config = config('github');
        $this->username = $config['username'];
        $this->repo = $config['repo'];
        $this->token = $config['token'];
    }

    public function getPosts(): Collection
    {
        $posts = Http::withHeaders([
            'Authorization' => "token {$this->token}",
            'Accept' => 'application/vnd.github.v3+json',
        ])->get("https://api.github.com/repos/{$this->username}/{$this->repo}/contents/")
            ->throw()
            ->collect();

        return $posts;
    }

    public function getPostBySlug(string $slug)
    {
        $post = Http::withHeaders([
            'Authorization' => "token {$this->token}",
            'Accept' => 'application/vnd.github.v3+json',
        ])->get("https://api.github.com/repos/{$this->username}/{$this->repo}/contents/{$slug}")
            ->throw()
            ->object();

        return $post;
    }
}
