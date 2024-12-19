<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
//use App\Http\Controllers\HomeController;



//Route::get('/', [HomeController::class, 'index']);
Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
