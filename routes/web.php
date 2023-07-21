<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sweetsController;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\newsweetsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Auth\RegisterController as RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CartController as CartController;
use App\Http\Controllers\MainController as MainController;
use App\Http\Controllers\HomeController as NewHomeController;
use App\Http\Controllers\Auth\LoginController as LoginController;
use App\Http\Controllers\NotFoundController as NotFoundController;
use App\Http\Controllers\UserDetailController as UserDetailController;
use App\Http\Controllers\Auth\Socialite\GoogleController as GoogleController;
use App\Http\Controllers\PasswordChangeController as PasswordChangeController;
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
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login-suc', [LoginController::class, 'login'])->name('login.suc'); 
Route::get('/register', [RegisterController::class, 'registration'])->name('registration');
Route::post('/register-suc', [RegisterController::class, 'store'])->name('register.store'); 
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Main UI pages
Route::get('/', [MainController::class,'main'])->name('main');
Route::get('/restaurants', [MainController::class,'showRestaurants'])->name('restaurant');
Route::get('/restaurant-detail/(vendorid)', [MainController::class,'ShowRestaurantsDetail'])->name('restaurant.detail');
Route::get('auth/google', [GoogleController::class,'redirectToGoogle'])->name('redirectToGoogle');
Route::get('auth/google/callback', [GoogleController::class,'handleGoogleCallback'])->name('handleGoogleCallback');

 

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
Auth::routes(['verify'=>true]);

// Route::get('/home', [NewHomeController::class, 'index'])->name('home');
Route::get('job-dispatch', [MainController::class, 'dispatchJob']);

//Customer Routes
Route::group (['middleware' => 'auth'], function () {
    Route::get('/cart-items', [MainController::class, 'getActiveCartItems'])->name('cartItems'); 
    Route::post('/cart-checkout', [CartController::class, 'cartCheckout'])->name('checkout');
});
Route::get('/search', [MainController::class, 'searchRestaurant'])->name('search.restaurant');
// for user detail handles
Route::get('/customerdetail', [UserDetailController::class, 'addCustomerDetail'])->name('customerdetail'); 
Route::post('/customerdetail/storeCustomerDetail', [UserDetailController::class, 'storeCustomerDetail'])->name('store.customerdetail'); 
Route::get('/customerdetail/edit/{id}', [UserDetailController::class, 'editDetail'])->name('edit.customerdetail'); 
Route::put('/customerdetail/update/(id)', [UserDetailController::class, 'updateDetail'])->name('update.customerdetail');
//
Route::get('/change-password', [PasswordChangeController::class, 'changePassword'])->name('password.change'); 
Route::get('/update-password', [PasswordChangeController::class, 'updatePassword'])->name('password.update'); 

//
Route::fallback([NotFoundController::class, 'show']);
// Route::get('/test-relation', [NewHomeController::class, 'testRelation']);
//Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
//Route::resource('/slider', SliderController::class)->middleware('auth');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
