<?php

use App\Http\Controllers\bannerApiController;
use App\Http\Controllers\categoryApi;
use App\Http\Controllers\contactController;
use App\Http\Controllers\couponApi;
use App\Http\Controllers\JWTcontroller;
use App\Http\Controllers\passwordApi;
use App\Http\Controllers\productApi;
use App\Http\Controllers\userAddressController;
use App\Http\Controllers\userApi;
use App\Http\Controllers\userOrder;
use App\Http\Controllers\wishlistController;
use App\Http\Controllers\cmsApi;
use App\Http\Controllers\configurationApi;
use App\Http\Controllers\firstController;
use App\Http\Controllers\subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'api'], function ($router) {
    Route::post('/register', [JWTcontroller::class, 'register']);
    Route::post('/login', [JWTcontroller::class, 'login']);
    Route::post('/logout', [JWTcontroller::class, 'logout']);
});
Route::apiResource('/contact', contactController::class);
Route::apiResource('banners', bannerApiController::class);
Route::apiResource('/categories', categoryApi::class);
Route::apiResource('/products', productApi::class);
Route::apiResource('/user', userApi::class);
Route::apiResource('/password', passwordApi::class);
Route::apiResource('/wishlist', wishlistController::class);
Route::apiResource('/getcoupons', couponApi::class);
Route::apiResource('/userorder', userOrder::class);
Route::apiResource('/address', userAddressController::class);
Route::apiResource('/displaycms', cmsApi::class);
Route::apiResource('/displayconfiguration', configurationApi::class);
Route::apiResource('/subscribe', subscribe::class);
Route::get('/track/{id}', [firstController::class, 'getTrack']);
