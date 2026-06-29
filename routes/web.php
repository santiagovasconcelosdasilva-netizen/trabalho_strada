<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SlideController;
use App\Models\Slide;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::get('/', function () {
    $slides = Slide::query()
        ->when(Schema::hasColumn('slides', 'is_active'), fn ($query) => $query->where('is_active', true))
        ->orderBy('priority')
        ->orderBy('id')
        ->get();

    return view('welcome', compact('slides'));
});

Route::redirect('/dashboard', '/slides')->name('dashboard');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::resource('slides', SlideController::class);
