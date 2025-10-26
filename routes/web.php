<?php

use App\Http\Controllers\SPMController;
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
    Route::get('/view', [SPMController::class, 'sarpasPAUD']);
    Route::post('/save', [SPMController::class, 'savePAUD']);

    Route::get('/tk', [SPMController::class, 'sarpasTK'])->name('sarpas.tk');
    Route::post('/tk', [SPMController::class, 'storeTK'])->name('sarpas.tk');

    Route::get('/kb', [SPMController::class, 'sarpasKB'])->name('sarpas.kb');
    Route::get('/sps', [SPMController::class, 'sarpasSPS'])->name('sarpas.sps');

    Route::get('/sd', [SPMController::class, 'sarpasSD'])->name('sarpas.sd');
    Route::post('/sd', [SPMController::class, 'storeSD'])->name('sarpas.sd');
});
