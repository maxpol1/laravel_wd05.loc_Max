<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MyController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function (){
    Route::get('/', [MyController::class, 'index']);
    Route::resource('categories', CategoryController::class)->except(['show']);
});

//Route::get('/admin', [MyController::class, 'index']);
//
//Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');
//Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
//Route::post('/admin/categories/create', [CategoryController::class, 'store'])->name('categories.store');
//Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
//Route::put('/admin/categories/{category}/update', [CategoryController::class, 'update'])->name('categories.update');
//
//Route::delete('/admin/categories/{category}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
