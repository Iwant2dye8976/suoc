<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', StudentController::class .'@index')->name('students.index'); 
Route::get('/students/create', StudentController::class . '@create')
->name('students.create'); 
Route::post('/students', StudentController::class .'@store')
->name('students.store');
Route::get('/students/{student}/edit', StudentController::class .'@edit')
->name('students.edit'); 
Route::get('/students/{student}/show', StudentController::class .'@show')
->name('students.show'); 
Route::put('/students/{student}', StudentController::class .'@update')
->name('students.update'); 
Route::delete('/students/{student}', StudentController::class .'@destroy')
->name('students.destroy');
