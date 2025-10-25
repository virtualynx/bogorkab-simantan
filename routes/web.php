<?php

use App\Http\Controllers\PublicController;
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

Route::get('/', [PublicController::class, 'index'])->name('/');
// TK
Route::get('/sarpas/tk', [PublicController::class, 'sarpasTK'])->name('sarpas.tk');
Route::post('/sarpas/tk', [PublicController::class, 'storeTK'])->name('sarpas.tk');

Route::get('/sarpas/kb', [PublicController::class, 'sarpasKB'])->name('sarpas.kb');
Route::get('/sarpas/sps', [PublicController::class, 'sarpasSPS'])->name('sarpas.sps');

Route::get('/sarpas/sd', [PublicController::class, 'sarpasSD'])->name('sarpas.sd');
Route::post('/sarpas/sd', [PublicController::class, 'storeSD'])->name('sarpas.sd');
