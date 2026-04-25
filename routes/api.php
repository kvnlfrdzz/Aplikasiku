<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;

Route::apiResource('posts', PostController::class);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/posts/search/{q}', [PostController::class, 'search']);

Route::get('/settings', function () {
    return response()->json([
        'hero_title_size' => '90px',
        'section_title_size' => '28px',
    ]);
});