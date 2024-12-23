<?php

use App\Http\Controllers\restockController;
use App\Http\Controllers\saleController;
use App\Http\Controllers\stuffController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



// route::resource('', App\Http\Controllers\HomeController::class);

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/users',[userController::class,'index']);
    Route::get('/restocks',[restockController::class,'index']);
    Route::get('/sales',[saleController::class,'index']);
    Route::get('/stuffs',[stuffController::class,'index']);

//     // Route::resource('roles', RoleController::class);
//     // Route::resource('users', UserController::class);
//     // Route::resource('products', ProductController::class);
});