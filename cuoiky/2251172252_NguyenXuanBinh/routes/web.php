<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

Route::get('/', PlayerController::class .'@index')->name('players.index'); 
Route::get('/players/create', PlayerController::class . '@create')
->name('players.create'); 
Route::post('/players', PlayerController::class .'@store')
->name('players.store');
Route::get('/players/{player}/edit', PlayerController::class .'@edit')
->name('players.edit'); 
Route::get('/players/{player}/show', PlayerController::class .'@show')
->name('players.show'); 
Route::put('/players/{player}', PlayerController::class .'@update')
->name('players.update'); 
Route::delete('/players/{player}', PlayerController::class .'@destroy')
->name('players.destroy');