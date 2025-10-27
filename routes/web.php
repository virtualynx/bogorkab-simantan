<?php

use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SPMController;
use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SPMController::class, 'index'])->name('/');

Route::prefix('sarpas')->group(function () {
    Route::get('/paud_view', [SPMController::class, 'sarpasPAUD']);
    Route::post('/paud_save', [SPMController::class, 'savePAUD']);

    Route::get('/sd', [SPMController::class, 'sarpasSDTest']);

    Route::get('/dasar_view', [SPMController::class, 'sarpasDasar']);
    Route::post('/dasar_save', [SPMController::class, 'saveDasar']);
});

Route::get('/statistics_', [StatisticController::class, 'statistics_']);
Route::get('/statistics', [StatisticController::class, 'statistics']);

Route::get('/school/answers', [SchoolController::class, 'showAnswers']);
