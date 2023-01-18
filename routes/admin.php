<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashBoardController;
use Illuminate\Support\Facades\Route;

/*
Route::prefix('/admin')->group(function(){
   Route::get([DashBoardController::class, 'getDashBoard']);
});
Investigar como hacerlo así*/

Route::get('/admin',[DashBoardController::class, 'getDashBoard'])->name('admin');
Route::get('/admin/products',[AdminController::class, 'getProducts'])->name('admin');
//Route::get('/admin/users',[AdminController::class, 'getUsers'])->name('admin');