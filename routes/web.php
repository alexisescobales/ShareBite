<?php

use App\Http\Controllers\ControlerUsuario;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProveedorController;
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

//Home de la pagina
Route::get('/', function () {return view('principal');})->name('principal');


//Home del registro a elegir rol...
Route::get('/regisrtoElec', function () {return view('login_pages.selection');});


route::middleware(['auth'])->group(function(){
    Route::group(["middleware" => "rol:3,0"], function () {
        Route::get('/mainRaider', [CoordenadasController::class, 'index']);
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



Route::get('/login', function () {
    return view('login_pages.log_in');
})->name('login');

Route::get('/register', function () {
    return view('login_pages.register');
})->name('register');

Route::get('/register_shop', function () {
    return view('login_pages.register_shop');
});

Route::get('/selection', function () {
    return view('login_pages.selection');
});

Route::get('/main', function () {
    return view('main_pages.main_screen');
})->name('main');

Route::get('/lista_proveedores',  [CoordenadasController::class, 'index'])->name('proveedores'); 

// Route::get('/lista_proveedores', function () {
//     return view('main_pages.lista_proveedores');
// })->name('proveedores');

Route::get('/lista_puntos_entrega', function () {
    return view('main_pages.lista_puntos_entrega');
})->name('lista_puntos_entrega');


Route::post('/proveedor_screen/{proveedor_id}', [ProveedorController::class, 'cargarProveedor'])->name('proveedor_screen'); 





// Route::get('/puntos_entrega', function () {
//     $puntos_entrega = puntos_entrega::all();
//     return response()->json($puntos_entrega);
// });



