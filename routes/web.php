<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterShopController;
use App\Http\Controllers\CoordenadasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CoordenadasController::class, 'index']);

Route::get('/log_in', [LoginController::class, 'showLoginForm'])->name('log_in_pages.log_in');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('log_in_pages.register');
Route::get('/register_shop', [RegisterShopController::class, 'showRegisterShopForm'])->name('log_in_pages.register_shop');


// Route::get('/puntos_entrega', function () {
//     $puntos_entrega = puntos_entrega::all();
//     return response()->json($puntos_entrega);
// });



