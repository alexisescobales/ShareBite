<?php

use App\Http\Controllers\ControlerUsuario;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterShopController;

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

Route::get('/', function () {return view('principal');})->name('principal');
Route::get('/regisrtoElec', function () {return view('login_pages.selection');});


route::middleware(['auth'])->group(function(){
    Route::group(["middleware" => "rol:3,0"], function () {
        Route::get('/mainRaider', function () {return view('main_pages.main_screen');});
    });
    Route::group(["middleware" => "rol:1,0"], function () {
        Route::get('/mainAdmin', function () {return view('administracion.admins', compact(Auth::user()));});
    });
    Route::group(["middleware" => "rol:2,0"], function () {

    });
    Route::group(["middleware" => "rol:0"], function () {
        
    });
});

Route::get('/log_in', [ControlerUsuario::class, 'showLoginForm'])->name('log_in_pages.log_in');
Route::post('/log_in', [ControlerUsuario::class, 'login']);
Route::post('/registro/{eleccion}', [ControlerUsuario::class, 'seleccion']);
Route::post('/registro1', [ControlerUsuario::class, 'registro1']);
Route::post('/registro2', [ControlerUsuario::class, 'registro2']);
Route::post('/registro3', [ControlerUsuario::class, 'registro3']);
Route::get('/register_shop', [RegisterShopController::class, 'showRegisterShopForm'])->name('log_in_pages.register_shop');




