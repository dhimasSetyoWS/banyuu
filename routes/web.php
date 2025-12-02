<?php

use App\Http\Controllers\CourseController;
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

Route::prefix('/dashboard')->middleware(['auth' , 'verified', 'role:student'])->group(function () {
    Route::get('/' , function () {
        return Inertia::render('Dashboard/Student/MainDashboard');
    })->name('dashboard');
    Route::get('/class' , function () {
        return Inertia::render('Dashboard/Student/MyClass');
    })->name('dashboard.class.index');
});

Route::prefix('/teacher/dashboard')->middleware(['auth' , 'verified' , 'role:teacher'])->group(function () {
    Route::get('/', function () {
        return Inertia::render('Dashboard/Teacher/MainDashboard');
    })->name('teacher.dashboard');
    Route::get('/manage-class', function () {
        return Inertia::render('Dashboard/Teacher/ManageClass');
    })->name('teacher.dashboard.class.index');
    Route::get('/manage-class/create', [CourseController::class, 'create'])->name('teacher.dashboard.class.create');
    Route::get('/manage-class/edit', function () {
        return Inertia::render('Dashboard/Teacher/Class/EditClass');
    })->name('teacher.dashboard.class.edit');
});
require __DIR__.'/auth.php';
