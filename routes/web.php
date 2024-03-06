<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/feedback', [HomeController::class, 'feedback'])->name('feedback');
Route::get('/team', [HomeController::class, 'showTeam'])->name('team');

Route::get('/login', [AuthController::class , 'showLogin' ])->name('login');
Route::post('/login', [AuthController::class , 'loginPost' ])->name('login.post');
Route::get('/register', [AuthController::class , 'showRegister' ])->name('register');
Route::post('/register', [AuthController::class , 'registerPost' ])->name('register.post');
Route::get('/logout', [AuthController::class , 'logout' ])->name('logout');

Route::get('/allcategory', [CategoryController::class, 'allCategory'])->name('allcategory');
Route::get('/addcategory', [CategoryController::class, 'addCategory'])->name('addcategory');
Route::post('/addcategory', [CategoryController::class , 'createCategory' ])->name('addcategory.post');
Route::get('/updatecategory', [CategoryController::class, 'updateCategory'])->name('updatecategory');
//Route::put('/updatecategory', [CategoryController::class, 'putUpdateCategory'])->name('updatecategory.put');


//Route::get('/category/id/', [CategoryController::class])