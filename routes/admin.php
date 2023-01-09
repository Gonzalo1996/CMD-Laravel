<?php
use App\Http\Controllers\DashBoardController;
use Illuminate\Support\Facades\Route;

/*
Route::prefix('/admin')->group(function(){
   Route::get([DashBoardController::class, 'getDashBoard']);
});
Investigar como hacerlo así*/

Route::get('/admin',[DashBoardController::class, 'getDashBoard'])->name('admin');