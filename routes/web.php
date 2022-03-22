<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/pets', 'App\Http\Controllers\PetController@index')->name("pet.index");
Route::get('/pets/create', 'App\Http\Controllers\PetController@create')->name("pet.create");
Route::post('/pets/save', 'App\Http\Controllers\PetController@save')->name("pet.save");
Route::get('/pets/show/{id}', 'App\Http\Controllers\PetController@show')->name("pet.show");
Route::get('/pets/delete/{id}', 'App\Http\Controllers\PetController@destroy')->name("pet.delete");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
