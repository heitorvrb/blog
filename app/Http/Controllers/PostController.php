<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    public function __invoke(string $slug): Response|string
    {
        return $slug;

        // return Inertia::render('Welcome', [
        //     'posts' => $posts,
        // ]);
    }
}
