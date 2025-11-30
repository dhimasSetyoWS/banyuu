<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Welcome');
    })->name('home');
    Route::get('/catalog', function () {
        return Inertia::render('Catalog');
    })->name('catalog');
    Route::get('/aboutus', function () {
        return Inertia::render('AboutUs');
    })->name('aboutus');
    Route::get('/contact', function () {
        return Inertia::render('Contact');
    })->name('contact');
});

Route::prefix('/dashboard')->middleware(['auth' , 'verified'])->group(function () {
    Route::get('/' , function () {
        return Inertia::render('Dashboard/Dashboard');
    })->name('dashboard');
});
require __DIR__.'/auth.php';
