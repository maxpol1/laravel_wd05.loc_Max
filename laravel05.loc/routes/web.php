<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MyController;
use App\Http\Controllers\ProductTnController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\CategoryController;
use \App\Http\Controllers\Admin\ProductController;

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


Route::get('/', SiteController::class);
Route::get('/catalog', [StoreController::class, 'index']);

Route::get('/cart', [CartController::class, 'getCart'])->name('cart');
Route::post('/add_to_cart', [CartController::class, 'add ToCart'])->name('add_to_cart');
Route::get('/catalog/{category_id}/{product_id}', [ProductTnController::class, 'product']);

Route::get('/test', function (\Illuminate\Http\Request $request){
   return view('test');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/', [MyController::class, 'index']);
//    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resources([
        'categories' => CategoryController::class,
        'products' => ProductController::class,
        'articles' => ArticleController::class,
    ]);
});

//Route::get('/admin', [MyController::class, 'index']);
//
//Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');
//Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
//Route::post('/admin/categories/create', [CategoryController::class, 'cotalog'])->name('categories.cotalog');
//Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
//Route::put('/admin/categories/{category}/update', [CategoryController::class, 'update'])->name('categories.update');
//
//Route::delete('/admin/categories/{category}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
