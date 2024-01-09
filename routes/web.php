<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EditarController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\EliminarController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\AsistenciaController;

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
    return view('index');
})->name('index');

/*
Route::get('/trabajadores', [ConsultasController::class, 'listarTrabajador'])->name('listar-trabajadores');
Route::get('/cargos', [ConsultasController::class, 'listarCargo'])->name('cargos');
Route::get('/home', [ConsultasController::class, 'listarAsistencia'])->name('home');
Route::get('/info', [ConsultasController::class, 'mostrarInfo'])->name('info');
*/
Route::get('/signin', [LoginController::class, 'loginView'])->name('login');
Route::get('/signup', [RegistroController::class, 'registerView'])->name('signup');

//Consulta filtro
Route::post('search', [ConsultasController::class,'search'])->name('search');

//Marcar asistencia
Route::post('/asistencia', [AsistenciaController::class, 'marcarAsistencia'])->name('asistencia');
Route::post('/asistencia-image', [AsistenciaController::class,'guardarImagen'])->name('guardar-imagen');

//Registros
Route::post('/registrar-docente', [RegistroController::class, 'registrarTrabajador'])->name('registrar-trabajador');
Route::post('/registrar-cargo', [RegistroController::class, 'registrarCargo'])->name('registrar-cargo');

//Eliminar registro
Route::delete('/eliminar/{dni}', [EliminarController::class, 'eliminarRegistro'])->name('eliminar-registro');
Route::delete('/eliminar-cargo/{id_cargo}', [EliminarController::class, 'eliminarCargo'])->name('eliminar-cargo');
Route::delete('/eliminar-usuario/{id}', [EliminarController::class, 'eliminarUser'])->name('eliminar-usuario');
Route::delete('/eliminar-asistencia/{dni}', [EliminarController::class, 'eliminarRegistroAsistencia'])->name('eliminar-registro-asistencia');

//Editar registro
Route::post('/editar/{dni}', [EditarController::class, 'editarRegistro'])->name('editar-registro');
Route::post('/editar-cargo/{id_cargo}', [EditarController::class, 'editarCargo'])->name('editar-cargo');
Route::post('/editar-info/{id_empresa}',[EditarController::class, 'editarInfo'])->name('editar-info');
Route::post('/editar-perfil/{id}', [EditarController::class, 'editarPerfil'])->name('editar-perfil');
Route::post('/cambiar-password/{id}', [EditarController::class, 'cambiarPassword'])->name('cambiar-password');

//Reportes
Route::get('/generar-pdf', [ReportController::class, 'generar'])->name('generar-reporte');
Route::get('/generar-pdf-asistencia', [ReportController::class, 'generarReporteAsistencia'])->name('generar-reporte-asistencia');

//Login
Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout'); 
Route::post('/registrar-usuario', [LoginController::class, 'signupUser'])->name('signup-user');

// Rutas que requieren autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/trabajadores', [ConsultasController::class, 'listarTrabajador'])->name('listar-trabajadores');
    Route::get('/usuarios', [ConsultasController::class, 'listarUsers'])->name('listar-usuarios');
    Route::get('/cargos', [ConsultasController::class, 'listarCargo'])->name('cargos');
    Route::get('/home', [ConsultasController::class, 'listarAsistencia'])->name('home');
    Route::get('/info', [ConsultasController::class, 'mostrarInfo'])->name('info');
});
