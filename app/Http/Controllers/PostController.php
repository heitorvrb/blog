<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    public function __invoke(string $slug): Response|string
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return Inertia::render("Posts/$post->page", [
            'post' => $post,
        ]);
    }
}
