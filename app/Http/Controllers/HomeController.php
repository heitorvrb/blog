<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
    {
        $posts = Post::all();
        return Inertia::render('Welcome', [
            'posts' => $posts,
        ]);
    }
}
