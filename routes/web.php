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
    Route::get('/catalog/nama_course', function () {
        return Inertia::render('SingleCatalog');
    })->name('catalog.single');
    Route::get('/aboutus', function () {
        return Inertia::render('AboutUs');
    })->name('aboutus');
    Route::get('/contact', function () {
        return Inertia::render('Contact');
    })->name('contact');
});

// Student
Route::prefix('/dashboard')->middleware(['auth', 'verified', 'role:student'])->group(function () {
    Route::get('/', function () {
        return Inertia::render('Dashboard/Student/MainDashboard');
    })->name('dashboard');
    Route::get('/class', function () {
        return Inertia::render('Dashboard/Student/MyClass');
    })->name('dashboard.class.index');
    Route::get('/class/detail-class', function () {
        return Inertia::render('Dashboard/Student/Class/DetailClass');
    })->name('dashboard.class.detail');
});


// Teacher
Route::prefix('/teacher/dashboard')->middleware(['auth', 'verified', 'role:teacher'])->group(function () {
    Route::get('/', function () {
        return Inertia::render('Dashboard/Teacher/MainDashboard');
    })->name('teacher.dashboard');
    Route::get('/manage-class', function () {

        return Inertia::render('Dashboard/Teacher/ManageClass', [
            'coursera' => auth()->user()->courses()->with('kategori')->get()
        ]);
    })->name('teacher.dashboard.class.index');
    Route::get('/manage-class/create', [CourseController::class, 'create'])->name('teacher.dashboard.class.create');
    Route::get('/manage-class/edit', function () {
        return Inertia::render('Dashboard/Teacher/Class/EditClass');
    })->name('teacher.dashboard.class.edit');
    Route::get('/manage-class/edit/material', function () {
        return Inertia::render('Dashboard/Teacher/Class/EditMaterial');
    })->name('teacher.dashboard.class.material');
    Route::get('/manage-class/create/session', function () {
        return Inertia::render('Dashboard/Teacher/Class/CreateSession');
    })->name('teacher.dashboard.class.create.session');
    Route::get('/manage-class/edit/session', function () {
        return Inertia::render('Dashboard/Teacher/Class/EditSession');
    })->name('teacher.dashboard.class.edit.session');
});
require __DIR__ . '/auth.php';
require __DIR__ . '/service.php';
