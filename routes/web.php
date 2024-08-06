<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('students', [StudentController::class, 'index'])->name('students.index'); 
Route::get('students/create', [StudentController::class, 'create'])->name('students.create'); 
Route::post('students', [StudentController::class, 'store'])->name('students.store'); 
Route::get('students/{student}', [StudentController::class, 'show'])->name('students.show'); 
Route::get('students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit'); 
Route::put('students/{student}', [StudentController::class, 'update'])->name('students.update'); 
Route::delete('students/{student}', [StudentController::class, 'destroy'])->name('students.destroy'); 


Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');