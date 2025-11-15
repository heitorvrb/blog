<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Mail\Markdown;
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

    public function show(string $locale, string $slug)
    {
        $post = $this->postService->getPostBySlug($slug);
        $markdown = base64_decode($post->content);
        $html = Markdown::parse($markdown);
        return view('post', compact('html'));
    }
}
