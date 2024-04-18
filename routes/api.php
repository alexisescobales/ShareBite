<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\gestionController;
use App\Http\Controllers\Api\ControlerMarcaHasPedido;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('gestion', gestionController::class);
//Crear nueva marca_has_pedido
Route::post('/marca_has_pedido', [ControlerMarcaHasPedido::class, 'marca_has_pedido'])->name('marca_has_pedido'); 