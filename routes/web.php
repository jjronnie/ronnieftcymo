<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

//For Logged in Admin 

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () { 
    //Student routes
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('/students',[StudentController::class, 'index'])->name('student.index');
    Route::get('/create-student',[StudentController::class, 'create'])->name('student.create');
    Route::post('/store-student',[StudentController::class, 'store'])->name('student.store'); 
    Route::get('/{id}/show-student',[StudentController::class, 'show'])->name('student.show');
    Route::get('/{id}/edit-student',[StudentController::class, 'edit'])->name('student.edit');
    Route::put('/{id}/update-student',[StudentController::class, 'update'])->name('student.update');
    Route::delete('/{id}/show-student', [StudentController::class, 'destroy'])->name('delete-student');

    //Courses Routes
    Route::get('/create-course', [CourseController::class, 'create'])->name('course.create');
    Route::post('/store-course', [CourseController::class, 'store'])->name('course.store');
    Route::get('/courses',[CourseController::class, 'index'])->name('course.index');
    Route::get('/{id}/show', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/{id}/edit', [CourseController::class, 'edit'])->name('course.edit');
    Route::put('/{id}/update', [CourseController::class, 'update'])->name('course.update');
    Route::delete('/{id}/destroy', [CourseController::class, 'destroy'])->name('course.destroy'); 
    
    //Enrollment
    Route::post('/enroll/{student_id}/{course_id}', [StudentController::class, 'enroll'])->name('enroll');
    

    //admin Routes 
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');




    
    





   



 
});





