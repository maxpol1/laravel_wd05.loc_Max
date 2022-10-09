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

    $query = [

        'key' =>env('WEATHER_API_KEY'),
        'q' => 'Minsk',
        'dt' => '1989-08-31'
    ];

//    $client = Http::baseUrl('http://api.weatherapi.com/v1');
//
//    $response =  $client->get('/current.json', $query);
//    $client = new \GuzzleHttp\Client();
//    $response = $client->get('http://api.weatherapi.com/v1/current.json?key=16fab3d8f2cf4017964171222220810&q=Minsk&dt=1989-08-31');
      $response = Http::retry(3, 100)->get('http://api.weatherapi.com/v1/current.json?key=16fab3d8f2cf4017964171222220810&q=Minsk&dt=1989-08-31');
//    $result = $response['current']['temp_c']. 'C'. ' '. $response['location']['region']. $query[dt];
    dd($response->json());
});

//Route::get('/converter', function (\Illuminate\Http\Request $request){
//    $response = Http::get( 'https://www.nbrb.by/api/exrates/currencies');
//    $currencies = $response->collect()->keyBy('Cur_Abbreviation');
////    dd($currencies);
//   return view('converter');
//});
//Route::get('/converter', function (\Illuminate\Http\Request $request){
//    $query = ['periodicity' => 0];
//    $response = Http::get( 'https://www.nbrb.by/api/exrates/rates', $query);
//    dd($response->collect()->keyBy('Cur_Abbreviation'));

//});


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
