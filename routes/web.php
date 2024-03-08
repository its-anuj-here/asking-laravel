<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/feedback', [HomeController::class, 'feedback'])->name('feedback');
Route::get('/team', [HomeController::class, 'showTeam'])->name('team');

Route::get('/login', [AuthController::class , 'showLogin' ])->name('login');
Route::post('/login', [AuthController::class , 'loginPost' ])->name('login.post');
Route::get('/register', [AuthController::class , 'showRegister' ])->name('register');
Route::post('/register', [AuthController::class , 'registerPost' ])->name('register.post');
Route::get('/logout', [AuthController::class , 'logout' ])->name('logout');

Route::get('/category/all', [CategoryController::class, 'allCategory'])->name('category.all');
Route::get('/category/{category}/show', [CategoryController::class, 'showCategory'])->name('category.show');
Route::get('/category/add', [CategoryController::class, 'addCategory'])->name('category.add');
Route::post('/category/add', [CategoryController::class , 'createCategory' ])->name('category.add.post');
Route::get('/category/{category}/update', [CategoryController::class, 'updateCategory'])->name('category.update');
//Route::put('/category/update', [CategoryController::class, 'putUpdateCategory'])->name('category.update.put');

Route::post('/category/{category}/question/create', [QuestionController::class, 'create'])->name('question.post');