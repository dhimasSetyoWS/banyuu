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

    // Create Session
    Route::get('/manage-class/create/session', function () {
        return Inertia::render('Dashboard/Teacher/Class/CreateSession');
    })->name('teacher.dashboard.class.create.session');
    // Edit Session
    Route::get('/manage-class/edit/session', function () {
        return Inertia::render('Dashboard/Teacher/Class/EditSession');
    })->name('teacher.dashboard.class.edit.session');

    // All Materi
    Route::get('/manage-class/nama_class', function () {
        return Inertia::render('Dashboard/Teacher/Class/EditMaterial');
    })->name('teacher.dashboard.class.material');

    // Create Materi Class
    Route::get('/manage-class/edit/session/create/materi', function () {
        return Inertia::render('Dashboard/Teacher/Class/Materi/CreateMateri');
    })->name('teacher.dashboard.class.create.material');

    // Edit Materi Class
    Route::get('/manage-class/edit/session/edit/materi/id_materi', function () {
        return Inertia::render('Dashboard/Teacher/Class/Materi/EditMateri');
    })->name('teacher.dashboard.class.edit.material');

    // Create Assignment
    Route::get('/manage-class/edit/session/create/assignment', function () {
        return Inertia::render('Dashboard/Teacher/Class/Assignment/CreateAssignment');
    })->name('teacher.dashboard.class.create.assignment');

    // Edit Assignment
    Route::get('/manage-class/edit/session/edit/assignment/id_assingment', function () {
        return Inertia::render('Dashboard/Teacher/Class/Assignment/EditAssignment');
    })->name('teacher.dashboard.class.edit.assignment');


    // Create Exam
    Route::get('/manage-class/edit/session/create/exam', function () {
        return Inertia::render('Dashboard/Teacher/Class/Exam/CreateExam');
    })->name('teacher.dashboard.class.create.exam');

    // Edit Exam
    Route::get('/manage-class/edit/session/edit/exam/id_exam', function () {
        return Inertia::render('Dashboard/Teacher/Class/Exam/EditExam');
    })->name('teacher.dashboard.class.edit.exam');

    // Create Project
    Route::get('/manage-class/edit/session/create/project', function () {
        return Inertia::render('Dashboard/Teacher/Class/Projek/CreateProjek');
    })->name('teacher.dashboard.class.create.project');

    // Edit Project
    Route::get('/manage-class/edit/session/edit/project/id_project', function () {
        return Inertia::render('Dashboard/Teacher/Class/Projek/EditProjek');
    })->name('teacher.dashboard.class.edit.project');

    // Create question from main dashboard
    Route::get('/question/create', function () {
        return Inertia::render('Dashboard/Question/CreatePertanyaan');
    })->name('dashboard.pertanyaan.create');

    // Edit question from main dashboard
    Route::get('/question/edit/id_question', function () {
        return Inertia::render('Dashboard/Question/EditPertanyaan');
    })->name('dashboard.pertanyaan.edit');

    // Create assesment from main dashboard
    Route::get('/assessment/create', function () {
        return Inertia::render('Dashboard/Assessment/CreateAssessment');
    })->name('dashboard.assessment.create');

    // Edit assesment from main dashboard
    Route::get('/assessment/edit/id_assessment', function () {
        return Inertia::render('Dashboard/Assessment/EditAssessment');
    })->name('dashboard.assessment.edit');

    // Create Material from main dashboard
    Route::get('/materi/create', function () {
        return Inertia::render('Dashboard/Material/CreateMaterial');
    })->name('dashboard.material.create');

    // Edit Material from main dashboard
    Route::get('/materi/edit/id_material', function () {
        return Inertia::render('Dashboard/Material/EditMaterial');
    })->name('dashboard.material.edit');

    // Edit Course
    Route::get('/manage-class/edit/{course}', [CourseController::class, 'edit'])->name('teacher.dashboard.class.edit');
});

// All Role
Route::prefix('/dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/question', function () {
        return Inertia::render('Dashboard/PertanyaanList');
    })->name('dashboard.pertanyaan.index');

    Route::get('/material', function () {
        return Inertia::render('Dashboard/MaterialList');
    })->name('dashboard.material.index');

    Route::get('/assesment', function () {
        return Inertia::render('Dashboard/AssessmentList');
    })->name('dashboard.assessment.index');
});
require __DIR__ . '/auth.php';
require __DIR__ . '/service.php';
