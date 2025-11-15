<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $locale = request()->getPreferredLanguage(['en', 'pt']);
    return redirect($locale);
});

Route::group(
    [
        'prefix' => '{locale}',
        'where' => ['locale' => 'en|pt'],
    ],
    function () {
        Route::get('/', [PostController::class, 'index'])->name('home');
        Route::get('/{slug}', [PostController::class, 'show'])->name('post');
    }
);
