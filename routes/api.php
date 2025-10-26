<?php

use App\Http\Api\HistoryApi;
use App\Http\Api\WilayahApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('wilayah')->group(function () {
    Route::get('/provinces', [WilayahApi::class, 'provinces']);
    Route::get('/regencies/{provinceCode}', [WilayahApi::class, 'regencies']);
    Route::get('/districts/{regencyCode}', [WilayahApi::class, 'districts']);
    Route::get('/villages/{districtCode}', [WilayahApi::class, 'villages']);
});

Route::prefix('history')->group(function () {
    Route::get('/school/answered_list', [HistoryApi::class, 'getSchoolAnsweredList']);
    Route::get('/school/byname', [HistoryApi::class, 'getSchoolByName']);
    Route::get('/checkanswer/by_schoolname', [HistoryApi::class, 'checkAnswerBySchoolName']);
});
