<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaatController;
use App\Http\Controllers\GunController;
use App\Http\Controllers\OgretmenController;
use App\Http\Controllers\DerslikController;
use App\Http\Controllers\BolumController;
use App\Http\Controllers\DersController;
use App\Http\Controllers\HomeController;
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

Route::apiResource('saatler', SaatController::class)->parameters([
    'saatler' => 'saat'
]);
Route::apiResource('gunler', GunController::class)->parameters([
    'gunler' => 'gun'
]);
Route::apiResource('ogretmenler', OgretmenController::class)->parameters([
    'ogretmenler' => 'ogretmen'
]);
Route::apiResource('bolumler', BolumController::class)->parameters([
    'bolumler' => 'bolum'
]);
Route::apiResource('dersler', DersController::class)->parameters([
    'dersler' => 'ders'
]);
Route::apiResource('derslikler', DerslikController::class)->parameters([
    'derslikler' => 'derslik'
]);
Route::apiResource('program', ProgramController::class)->parameters([
    'program' => 'program'
]);

Route::delete('/gunler', [GunController::class, 'destroy']);
Route::get('stats', [HomeController::class, 'stats']);
