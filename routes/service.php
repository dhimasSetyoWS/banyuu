<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

// Course/Class resource
Route::prefix('/teacher/tasks')->middleware(['auth', 'verified' , 'role:teacher'])->group(function () {
    Route::post('/store' , [CourseController::class , 'store'])->name('course.store');
});
