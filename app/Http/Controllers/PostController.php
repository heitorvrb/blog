<?php

namespace App\Http\Controllers;

use App\Services\PostService;

class PostController extends Controller
{

    public function __construct(
        private PostService $postService,
    ) {}

    public function index()
    {
        $posts = $this->postService->getPosts();

        return view('home', [
            'posts' => $posts,
        ]);
    }

    public function show(string $slug)
    {
        return "show method for: {$slug}";
    }
}
