<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', ProductController::class .'@index')->name('products.index'); 
// returns the form for adding a post 
Route::get('/products/create', ProductController::class . '@create')
->name('products.create'); 
// adds a post to the database 
Route::post('/products', ProductController::class .'@store')
->name('products.store'); 
// returns the form for editing a post 
Route::get('/products/{product}/edit', ProductController::class .'@edit')
->name('products.edit'); 
// updates a post 
Route::put('/products/{product}', ProductController::class .'@update')
->name('products.update'); 
// deletes a post 
Route::delete('/products/{product}', ProductController::class .'@destroy')
->name('products.destroy');

