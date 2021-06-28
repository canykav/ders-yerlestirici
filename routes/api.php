<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaatController;
use App\Http\Controllers\GunController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/saatler')->group(function () {
    Route::get('/', [SaatController::class, 'index']);
    Route::post('/', [SaatController::class, 'store']);
    Route::put('/{saat_id}', [SaatController::class, 'update']);
    Route::get('/{saat_id}', [SaatController::class, 'show']);
    Route::delete('/{saat_id}', [SaatController::class, 'destroy']);
});

Route::prefix('/gunler')->group(function () {
    Route::get('/', [GunController::class, 'index']);
    Route::post('/', [GunController::class, 'store']);
    Route::put('/{gun_id}', [GunController::class, 'update']);
    Route::get('/{gun_id}', [GunController::class, 'show']);
    Route::delete('/', [GunController::class, 'destroy']);
});

