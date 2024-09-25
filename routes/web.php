<?php

use App\Http\Controllers\PersonaController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProcedenciaController;
use App\Http\Controllers\InfraccionController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ComprobanteController;
use App\Http\Controllers\ArchivoController;
use Illuminate\Support\Facades\Storage;



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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';


// Listar personas
Route::get('personas', [PersonaController::class, 'index'])->name('personas.index');

// Mostrar formulario de creación
Route::get('personas/create', [PersonaController::class, 'create'])->name('personas.create');

// Guardar nueva persona
Route::post('personas', [PersonaController::class, 'store'])->name('personas.store');

// Mostrar formulario de edición
Route::get('personas/{persona}/edit', [PersonaController::class, 'edit'])->name('personas.edit');

// Actualizar persona
Route::put('personas/{persona}', [PersonaController::class, 'update'])->name('personas.update');

// Eliminar persona
Route::delete('personas/{persona}', [PersonaController::class, 'destroy'])->name('personas.destroy');


Route::resource('procedencias', ProcedenciaController::class);

Route::get('/infracciones', [InfraccionController::class, 'index'])->name('infracciones.index');
Route::get('/infracciones/create', [InfraccionController::class, 'create'])->name('infracciones.create');
Route::post('/infracciones', [InfraccionController::class, 'store'])->name('infracciones.store');
Route::get('/infracciones/{infraccion}/edit', [InfraccionController::class, 'edit'])->name('infracciones.edit');
Route::put('/infracciones/{infraccion}', [InfraccionController::class, 'update'])->name('infracciones.update');
Route::delete('/infracciones/{infraccion}', [InfraccionController::class, 'destroy'])->name('infracciones.destroy');


// Rutas para el módulo de Expedientes
Route::prefix('expedientes')->group(function () {
    Route::get('/', [ExpedienteController::class, 'index'])->name('expedientes.index');
    Route::get('create', [ExpedienteController::class, 'create'])->name('expedientes.create');
    Route::post('/', [ExpedienteController::class, 'store'])->name('expedientes.store');
    Route::get('{expediente}', [ExpedienteController::class, 'show'])->name('expedientes.show');
    Route::get('{expediente}/edit', [ExpedienteController::class, 'edit'])->name('expedientes.edit');
    Route::put('{expediente}', [ExpedienteController::class, 'update'])->name('expedientes.update');
    Route::delete('{expediente}', [ExpedienteController::class, 'destroy'])->name('expedientes.destroy');
    Route::get('/expedientes/{id}/edit_estado', [ExpedienteController::class, 'editEstado'])->name('expedientes.edit_estado');
    Route::put('/expedientes/{id}/update_estado', [ExpedienteController::class, 'updateEstado'])->name('expedientes.update_estado');
    Route::post('expedientes/{expediente}/baja', [ExpedienteController::class, 'baja'])->name('expedientes.baja');

});


Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
Route::post('/reportes/generate', [ReporteController::class, 'generate'])->name('reportes.generate');

// Rutas para pagos
Route::resource('pagos', PagoController::class);

// Rutas para comprobantes
Route::get('/comprobantes/create', [ComprobanteController::class, 'create'])->name('comprobantes.create');
Route::post('/comprobantes', [ComprobanteController::class, 'store'])->name('comprobantes.store');



Route::get('/archivos', [ArchivoController::class, 'index'])->name('archivos.index');
Route::get('/archivos/search', [ArchivoController::class, 'showSearchForm'])->name('archivos.searchForm');
Route::post('/archivos', [ArchivoController::class, 'store'])->name('archivos.store');


Route::get('archivos/{filename}', function ($filename) {
    $path = storage_path('app/public/archivos/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->name('archivos.ver');