<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaatController;
use App\Http\Controllers\GunController;
use App\Http\Controllers\OgretmenController;
use App\Http\Controllers\DerslikController;
use App\Http\Controllers\BolumController;

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

Route::prefix('/ogretmenler')->group(function () {
    Route::get('/', [OgretmenController::class, 'index']);
    Route::post('/', [OgretmenController::class, 'store']);
    Route::put('/{ogretmen_id}', [OgretmenController::class, 'update']);
    Route::get('/{ogretmen_id}', [OgretmenController::class, 'show']);
    Route::delete('/', [OgretmenController::class, 'destroy']);
});

Route::prefix('/bolumler')->group(function () {
    Route::get('/', [BolumController::class, 'index']);
    Route::post('/', [BolumController::class, 'store']);
    Route::put('/{bolum_id}', [BolumController::class, 'update']);
    Route::get('/{bolum_id}', [BolumController::class, 'show']);
    Route::delete('/', [BolumController::class, 'destroy']);
});

Route::prefix('/derslikler')->group(function () {
    Route::get('/', [DerslikController::class, 'index']);
    Route::post('/', [DerslikController::class, 'store']);
    Route::put('/{derslik_id}', [DerslikController::class, 'update']);
    Route::get('/{derslik_id}', [DerslikController::class, 'show']);
    Route::delete('/', [DerslikController::class, 'destroy']);
});