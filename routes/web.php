<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as NewHomeController;
use App\Http\Controllers\sweetsController;
use App\Http\Controllers\newsweetsController;
use App\Http\Controllers\MainController as MainController;
// use App\Http\Controllers\Admin\DashboardController as DashboardController;
// use App\Http\Controllers\Admin\SliderController as SliderController;
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
// Main UI pages
Route::get('/', [MainController::class,'main'])->name('main');
Route::get('/restaurants', [MainController::class,'showRestaurants'])->name('restaurant');
Route::get('/restaurant-detail/(vendorid)', [MainController::class,'ShowRestaurantsDetail'])->name('restaurant.detail');

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/cform/(param?)',[newHomeController::class,'newHome'])->name('newhome');
// Route::post('/cform-submit',[newHomeController::class,'Submit'])->name('cform');
//Route::get('/sweet-form',[sweetsController::class,'create']);
//Route::post('/sweet-form-submit',[sweetsController::class,'store'])->name('sweets.store');
//Route::get('/get-sweet',[sweetsController::class,'index']);
// Route::resource('/new-sweet',newsweetsController::class);



//For Authentication
Auth::routes();

// Route::get('/home', [NewHomeController::class, 'index'])->name('home');

// Route::get('/test-relation', [NewHomeController::class, 'testRelation']);
//Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
//Route::resource('/slider', SliderController::class)->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
