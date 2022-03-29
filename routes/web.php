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

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete");
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");

Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
});

Route::get('/pets', 'App\Http\Controllers\PetController@index')->name("pet.index");
Route::get('/pets/create', 'App\Http\Controllers\PetController@create')->name("pet.create");
Route::post('/pets/save', 'App\Http\Controllers\PetController@save')->name("pet.save");
Route::get('/pets/show/{id}', 'App\Http\Controllers\PetController@show')->name("pet.show");
Route::get('/pets/delete/{id}', 'App\Http\Controllers\PetController@destroy')->name("pet.delete");
Auth::routes();

Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    Route::get('/admin/roles', 'App\Http\Controllers\Admin\AdminRoleController@index')->name("admin.role.index");
    Route::get('/admin/roles', 'App\Http\Controllers\Admin\AdminRoleController@index')->name("admin.role.index");
    Route::delete('/admin/roles/{id}/delete', 'App\Http\Controllers\Admin\AdminRoleController@delete')->name("admin.role.delete");
    Route::get('/admin/roles/{id}/edit', 'App\Http\Controllers\Admin\AdminRoleController@edit')->name("admin.role.edit");
    Route::put('/admin/roles/{id}/update', 'App\Http\Controllers\Admin\AdminRoleController@update')->name("admin.role.update");
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store");
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
