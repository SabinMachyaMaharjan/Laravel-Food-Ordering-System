<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CartController as CartController;
use App\Http\Controllers\API\VerificationController as VerificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
//Route::get('add-to-cart/{product_id}',[CartController::class,'addToCart']);
Route::group (['middleware' => ['auth:api']], function () {
    Route::group(['middleware'=>'verified'], function () {
    Route::get('add-to-cart/{product_id}', [CartController::class,'addToCart']);
});
// email verification
Route::get('email/verification-notification', [VerificationController::class, 'sendVerificationEmail']);
});