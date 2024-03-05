<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthController::class , 'showLogin' ])->name('login');
Route::post('/login', [AuthController::class , 'loginPost' ])->name('login.post');
Route::get('/register', [AuthController::class , 'showRegister' ])->name('register');
Route::post('/register', [AuthController::class , 'registerPost' ])->name('register.post');
Route::get('/logout', [AuthController::class , 'logout' ])->name('logout');

Route::get('/allcategory', [CategoryController::class, 'allCategory'])->name('allcategory');
Route::get('/addcategory', [CategoryController::class, 'addCategory'])->name('addcategory');
Route::post('/addcategory', [CategoryController::class , 'createCategory' ])->name('addcategory.post');

//Route::get('/category/id/', [CategoryController::class])