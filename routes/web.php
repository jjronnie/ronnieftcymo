<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentDashboardController;


use App\Http\Controllers\DashboardController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {   

    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('/student-dashboard',[StudentDashboardController::class, 'index'])->name('student-dashboard');

    

    Route::get('/create-student',[StudentController::class, 'create'])->name('student.create');
    Route::post('/store-student',[StudentController::class, 'store'])->name('student.store');
    Route::get('/students',[StudentController::class, 'index'])->name('student.index');
    Route::get('/{id}/show',[StudentController::class, 'show'])->name('student.show');
    Route::get('/{id}/edit',[StudentController::class, 'edit'])->name('student.edit');
    Route::put('/{id}/update',[StudentController::class, 'update'])->name('student.update');

    

 
});





