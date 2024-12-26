<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\discountController;
use App\Http\Controllers\restockController;
use App\Http\Controllers\restockDetailController;
use App\Http\Controllers\saleController;
use App\Http\Controllers\stuffController;
use App\Http\Controllers\taxController;
use App\Http\Controllers\userController;
use App\Models\restock_detail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



// route::resource('', App\Http\Controllers\HomeController::class);

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    // user routes
    Route::get('/users',[userController::class,'index']);
    
    // restock routes
    Route::get('/restocks',[restockController::class,'index']);
    Route::get('/restocks/create',[restockController::class,'create'])->name('restocks.create');
    Route::post('/restocks/store',[restockController::class,'store']);
    Route::get('/restocks/{id}/edit',[restockController::class,'edit']);
    Route::put('/restocks/{id}',[restockController::class,'update']);
    Route::delete('/restock/{id}',[restockController::class,'delete']);

    // restock_details routes
    Route::get('/restock_details/{id}/create',[restockDetailController::class,'create']);
    Route::get('/restock_details/{id}/edit',[restockDetailController::class,'edit']);
    // sale routes
    Route::get('/sales',[saleController::class,'index']);

    // stuff routes
    Route::get('/stuffs',[stuffController::class,'index'])->name('stuffs.index');
    Route::get('/stuffs/create',[stuffController::class,'create']);
    Route::post('/stuffs/store',[stuffController::class,'store']);
    Route::get('/stuffs/{id}/edit',[stuffController::class,'edit']);
    Route::put('/stuffs/{id}',[stuffController::class,'update']);
    Route::delete('/stuffs/{id}',[stuffController::class,'destroy']);

    // category routes
    Route::get('/categories/create',[categoryController::class,'index']);
    Route::post('/categories/store',[categoryController::class,'store']);
    Route::get('/categories/{id}/edit',[categoryController::class,'edit']);
    Route::put('/categories/{id}',[categoryController::class,'update']);
    Route::delete('/categories/{id}',[categoryController::class,'destroy']);


    // discount routes
    Route::get('/discounts/create',[discountController::class,'create']);
    Route::post('/discounts/store',[discountController::class,'store']);
    Route::get('/discounts/{id}/edit',[discountController::class,'edit']);
    Route::put('/discounts/{id}',[discountController::class,'update']);
    Route::delete('/discounts/{id}',[discountController::class,'destroy']);

    // tax routes
    Route::get('/taxes/create',[taxController::class,'create']);
    Route::post('/taxes/store',[taxController::class,'store']);
    Route::get('/taxes/{id}/edit',[taxController::class,'edit']);
    Route::put('/taxes/{id}',[taxController::class,'update']);
    Route::delete('/taxes/{id}',[taxController::class,'destroy']);

    
//     // Route::resource('roles', RoleController::class);
//     // Route::resource('users', UserController::class);
//     // Route::resource('products', ProductController::class);
});