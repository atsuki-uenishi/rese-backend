<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use Facade\FlareClient\Api;

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


Route::group([
    'middleware' => ['auth:api'],
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', [AuthController::class, 'register'])->withoutMiddleware(['auth:api']);
    Route::post('login', [AuthController::class, 'login'])->withoutMiddleware(['auth:api']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user', [AuthController::class, 'me']);
    Route::apiResource('v1/likes', LikeController::class,)->only(['store', 'destroy']);
    Route::apiResources([
        'v1/reservations' => ReservationController::class,
        'v1/reviews' => ReviewController::class
    ],
    [
        'only' => ['store', 'destroy', 'update']
    ]);
    Route::apiResources([
        'v1/users.likes' => LikeController::class,
        'v1/users.reservations' => ReservationController::class,
    ],
    [
        'only' => ['index']
    ]);
});

Route::apiResource('/v1/users', UserController::class)->only('show');
Route::apiResource('/v1/stores', StoreController::class)->only(['index','show']);
Route::apiResource('/v1/stores.reviews', ReviewController::class)->only('index');




// Route::apiResource('/v1/users', UserController::class);
// Route::apiResource('/v1/stores', StoreController::class);
// Route::apiResource('/v1/likes', LikeController::class);
// Route::apiResource('/v1/reservations', ReservationController::class);
// Route::get('/v1/users/{user_id}/likes', [LikeController::class, 'getLikes']);
// Route::get('/v1/users/{user_id}/reservations', [ReservationController::class, 'getReservations']);
