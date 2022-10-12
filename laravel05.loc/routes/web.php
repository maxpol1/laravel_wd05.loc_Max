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

Route::get('/xchangeRates', function (\Illuminate\Http\Request $request){
//    $response = Http::retry(3, 100)->get('https://www.nbrb.by/api/exrates/currencies');
//    $currencies = $response->collect()->keyBy('Cur_Abbreviation');
//     dd($currencies);
     return view('well.xchangeRates', compact('currencies'));
});



Route::post('/apivk', function (\Illuminate\Http\Request $request){
    $query =[
        'fields' => [
            'activities',
            'about',
            'city',
            'photo_200'
        ],
        'user_id' => $request->input('user_id'),

        'v' => '5.131',
//        'client_id' => env('API_ID'),
        'access_token' => env('ACCESS_TOKEN')
    ];
   $response = Http::retry(3, 100)->get('https://api.vk.com/method/users.get', $query);


$data = $response->json();

//dd($data);

return view('vk.api_vk_user', [
    'user' => $data["response"][0],
]);


});
Route::get('apivk', function(\Illuminate\Http\Request $request){

    return view('vk.apivk');

});



Route::get('/test', function (\Illuminate\Http\Request $request){
//    $job = new \App\Jobs\FirstJob();
//    $job->dispatch('ksbvksdbvkdb');
//    \App\Jobs\FirstJob::dispatch('kdnvkslvnsv');

//    $mail = new  \App\Mail\FirstMail('ffvfdvf'); емайлы очереди выводы.
//    \Illuminate\Support\Facades\Mail::send($mail);


//    \App\Jobs\FirstJob::dispatchAfterResponse('hjhvjhv kdnvkslvnsv');

//    ->onQueue('test')

//    $query = [
//
//        'key' =>env('WEATHER_API_KEY'),
//        'q' => 'Minsk',
//        'dt' => '1989-08-31'
//    ];

//    $client = Http::baseUrl('http://api.weatherapi.com/v1');
//
//    $response =  $client->get('/current.json', $query);
//    $client = new \GuzzleHttp\Client();
//    $response = $client->get('http://api.weatherapi.com/v1/current.json?key=16fab3d8f2cf4017964171222220810&q=Minsk&dt=1989-08-31');
//      $response = Http::retry(3, 100)->get('http://api.weatherapi.com/v1/current.json?key=16fab3d8f2cf4017964171222220810&q=Minsk&dt=1989-08-31');
//    $result = $response['current']['temp_c']. 'C'. ' '. $response['location']['region']. $query[dt];
//    dd($response->json());
//    return view('test', compact('response'));
});

//Route::get('/xchangeRates', function (\Illuminate\Http\Request $request){
//    $response = Http::retry(3, 100)->get( 'https://www.nbrb.by/api/exrates/currencies');
//    $currencies = $response->collect()->keyBy('Cur_Abbreviation');
//    dd($currencies);
//   return view('well.xchangeRates');
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
