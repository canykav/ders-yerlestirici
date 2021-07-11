<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaatController;
use App\Http\Controllers\GunController;
use App\Http\Controllers\OgretmenController;
use App\Http\Controllers\DerslikController;
use App\Http\Controllers\BolumController;
use App\Http\Controllers\DersController;
use App\Http\Controllers\ProgramController;

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
    Route::delete('/{ogretmen_id}', [OgretmenController::class, 'destroy']);
});

Route::prefix('/bolumler')->group(function () {
    Route::get('/', [BolumController::class, 'index']);
    Route::post('/', [BolumController::class, 'store']);
    Route::put('/{bolum_id}', [BolumController::class, 'update']);
    Route::get('/{bolum_id}', [BolumController::class, 'show']);
    Route::delete('/{bolum_id}', [BolumController::class, 'destroy']);
});

Route::prefix('/dersler')->group(function () {
    Route::get('/', [DersController::class, 'index']);
    Route::post('/', [DersController::class, 'store']);
    Route::put('/{ders_id}', [DersController::class, 'update']);
    Route::get('/{ders_id}', [DersController::class, 'show']);
    Route::delete('/{ders_id}', [DersController::class, 'destroy']);
});

Route::prefix('/derslikler')->group(function () {
    Route::get('/', [DerslikController::class, 'index']);
    Route::post('/', [DerslikController::class, 'store']);
    Route::put('/{derslik_id}', [DerslikController::class, 'update']);
    Route::get('/{derslik_id}', [DerslikController::class, 'show']);
    Route::delete('/{derslik_id}', [DerslikController::class, 'destroy']);
});

Route::prefix('/program')->group(function () {
    Route::get('/', [ProgramController::class, 'index']);
    Route::post('/', [ProgramController::class, 'store']);
    Route::put('/{derslik_id}', [ProgramController::class, 'update']);
    Route::get('/{derslik_id}', [ProgramController::class, 'show']);
    Route::delete('/{derslik_id}', [ProgramController::class, 'destroy']);
});