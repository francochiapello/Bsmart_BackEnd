<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/products', [ProductController::class,"index"]);
    Route::post('/product',[ProductController::class,'store']);
    Route::get('/product/{id}',[ProductController::class,'show']);
    Route::put('/product/{id}',[ProductController::class,'update']);
    Route::delete('/product/{id}',[ProductController::class,'destroy']);
    Route::post('/products/all',[ProductController::class,'getAll']);

    Route::controller(CategoryController::class)->group(function(){
        Route::get('/categories', 'index');  //listado de categorias
        Route::get('/category/{id}', 'show');//mostrar una categoria en
        Route::post('/category','store');
        Route::put('/category/{id}','update');
        Route::delete('/category/{id}','destroy');
        Route::get('/categories/select/{fill?}', 'select');//listado filtrado por nombre
        Route::post('/categories/all','getAll');
    });
});

Route::post('auth/register', [UserController::class,"createUser"]);
Route::post('auth/login', [UserController::class,"loginUser"]);

// Route::controller(ProductController::class)->group(function(){
//     Route::get('/products', 'index');
//     Route::post('/product','store');
//     Route::get('/product/{id}','show');
//     Route::put('/product/{id}','update');
//     Route::delete('/product/{id}','destroy');
//     Route::post('/products/all','getAll');
// });


