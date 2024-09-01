<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

//apis

Route::post('/websites/{website}/posts', [PostController::class, 'store'])->name('websites.posts.store');
Route::post('/websites/{website}/subscribe', [SubscriberController::class, 'subscribe'])->name('websites.subscribe');


