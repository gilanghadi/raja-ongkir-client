<?php

use App\Http\Controllers\CekongkirController;
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

Route::get('/', [CekongkirController::class, 'index']);
Route::post('/', [CekongkirController::class, 'store'])->name('cek-ongkir');
// Route::get('/cetak-pdf', [CekongkirController::class, 'cetak'])->name('cetak-pdf');
