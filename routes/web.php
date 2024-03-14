<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PruebaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Auth/Login');
});

Route::get('/home',function(){
    return Inertia::render('Principal/Principal');
});

Route::get('/example',function(){
    return Inertia::render('Example');
});

Route::get('/modal',function(){
return Inertia::render('Modal2');
});


Route::get('/csrf-token', function() {
    return response()->json(['csrf_token' => csrf_token()]);
});

Route::get('/prueba_formulario',[PruebaController::class,'index'])->name('prueba.index');


Route::post('/prueba', [PruebaController::class, 'store'])->name('prueba.store');

Route::get('/prueba/getData', [PruebaController::class, 'getPruebas'])->name('prueba.getPruebas');

Route::post('/prueba_eliminar',[PruebaController::class,'destroy'])->name('prueba.destroy');

Route::get('/ediar_prueba',[PruebaController::class,'edit'])->name('prueba.edit');

Route::post('/prueba_editar',[PruebaController::class,'update'])->name('prueba.update');


/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});*/

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/clientes', function () {
    return Inertia::render('Principal/clientes/Clientes');
});

Route::get('/pozos', function () {
    return Inertia::render('Principal/pozos/Pozos');
});

Route::get('/bitacora', function () {
    return Inertia::render('Principal/bitacora/Bitacora');
});
Route::get('/crear_bitacora', function () {
    return Inertia::render('Principal/bitacora/Create');
});

Route::get('/usuarios', function () {
    return Inertia::render('Principal/usuarios/Usuarios');
});

Route::get('/ver_presupuestos', function () {
    return Inertia::render('Principal/presupuestos/Presupuestos');
});

Route::get('/crear_presupuestos', function () {
    return Inertia::render('Principal/presupuestos/Create');
});

Route::get('/ver_comunicados', function () {
    return Inertia::render('Principal/comunicados/Comunicados');
});

Route::get('/crear_comunicados', function () {
    return Inertia::render('Principal/comunicados/Create');
});

Route::get('/ver_reportes', function () {
    return Inertia::render('Principal/reportes/Reportes');
});

Route::get('/crear_reportes', function () {
    return Inertia::render('Principal/reportes/Create');
});




require __DIR__.'/auth.php';

