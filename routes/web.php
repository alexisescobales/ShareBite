<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;
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

Route::get('/', function () {return view('principal');})->name('principal');
Route::get('/regisrtoElec', function () {return view('login_pages.selection');});


route::middleware(['auth'])->group(function(){
    Route::group(["middleware" => "rol:3,0,2"], function () {
        Route::get('/mainRaider', [CoordenadasController::class, 'index'])->name('main');
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



Route::get('/estadisticas', [PerfilProveedorControler::class, 'index'])->name('estadisticas');

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

Route::get('/lista_proveedores', function () {
    return view('main_pages.lista_proveedores');
})->name('proveedores');

Route::get('/lista_puntos_entrega', function () {
    return view('main_pages.lista_puntos_entrega');
})->name('lista_puntos_entrega');

Route::post('/proveedor_screen/{proveedor_id}', [ProveedorController::class, 'cargarProveedor'])->name('proveedor_screen'); 





// Route::get('/puntos_entrega', function () {
//     $puntos_entrega = puntos_entrega::all();
//     return response()->json($puntos_entrega);
// });


Route::get('/admins', [adminController::class, 'index'])->name('administrar');
Route::get('/mostrar-usuarios', [adminController::class, 'mostrar'])->name('mostrar.usuarios');
Route::post('crearUser', [adminController::class, 'store'])->name('crearUser');
Route::get('/editarform/{id}', [adminController::class, 'editarUser'])->name('editarform');
Route::get('/editar/{id}', [adminController::class, 'editar'])->name('editar');
Route::delete('/usuarios/{id}', [adminController::class, 'eliminar'])->name('eliminar');
Route::get('/crear', function () {
    return view('administracion.crear');
})->name('crear');

Route::get('/adminsvue', function () {
    return view('administracion.adminsvue');
});