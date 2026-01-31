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
    // Create Class
    Route::get('/manage-class/create', [CourseController::class, 'create'])->name('teacher.dashboard.class.create');
    // Edit Material Class
    Route::get('/manage-class/edit/material', [CourseController::class, 'edit_material'])->name('teacher.dashboard.class.edit.material');
    // Create Session
    Route::get('/manage-class/create/session', function () {
        return Inertia::render('Dashboard/Teacher/Class/CreateSession');
    })->name('teacher.dashboard.class.create.session');
    // Edit Session
    Route::get('/manage-class/edit/session', function () {
        return Inertia::render('Dashboard/Teacher/Class/EditSession');
    })->name('teacher.dashboard.class.edit.session');

    // Create Materi
    Route::get('/manage-class/edit/session/create/materi', function () {
        return Inertia::render('Dashboard/Teacher/Class/Materi/CreateMateri');
    })->name('teacher.dashboard.class.create.materi');

    // Create Assignment
    Route::get('/manage-class/edit/session/create/assignment', function () {
        return Inertia::render('Dashboard/Teacher/Class/Assignment/CreateAssignment');
    })->name('teacher.dashboard.class.create.assignment');

    // Create Exam
    Route::get('/manage-class/edit/session/create/exam', function () {
        return Inertia::render('Dashboard/Teacher/Class/Exam/CreateExam');
    })->name('teacher.dashboard.class.create.exam');

    // Create Project
    Route::get('/manage-class/edit/session/create/project', function () {
        return Inertia::render('Dashboard/Teacher/Class/Projek/CreateProjek');
    })->name('teacher.dashboard.class.create.project');
    // Edit Course
    Route::get('/manage-class/edit/{course}', [CourseController::class, 'edit'])->name('teacher.dashboard.class.edit');
});

// All Role
Route::prefix('/dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/question', function () {
        return Inertia::render('Dashboard/Pertanyaan');
    })->name('dashboard.pertanyaan');

    Route::get('/material', function () {
        return Inertia::render('Dashboard/Material');
    })->name('dashboard.material');
});
require __DIR__ . '/auth.php';
require __DIR__ . '/service.php';
