<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;
use App\Models\Slide;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $slides = Slide::orderBy('id', 'desc')->get();
    return view('welcome', compact('slides'));
});

Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::resource('users', UserController::class);
Route::resource('slides', SlideController::class);