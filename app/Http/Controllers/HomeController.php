<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
    {
        $posts = [
            [
                'id' => 1,
                'slug' => 'blog-title-1',
                'title' => 'Blog Title 1',
                'contents' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vestibulum odio eros, a dapibus lacus cursus nec. Quisque commodo a dolor vel vulputate. Pellentesque quis felis id ligula varius ultrices eu ac ex.',
            ]
        ];

        return Inertia::render('Welcome', [
            'posts' => $posts,
        ]);
    }
}
