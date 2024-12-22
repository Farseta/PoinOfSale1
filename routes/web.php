<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route::resource('', App\Http\Controllers\HomeController::class);

// Route::group(['middleware' => ['auth']], function() {
//     // Route::resource('roles', RoleController::class);
//     // Route::resource('users', UserController::class);
//     // Route::resource('products', ProductController::class);
// });