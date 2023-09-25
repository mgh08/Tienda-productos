<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExampleController;
use App\Http\Modules\Cliente\Controller\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

require __DIR__ .'/categoria/categoria.php';
require __DIR__ .'/cliente/cliente.php';
require __DIR__ .'/productos/producto.php';
require __DIR__ .'/modoPago/modoPago.php';
require __DIR__ .'/factura/factura.php';
require __DIR__ . '/detalle/detalle.php';



Route::middleware('example')->get('/', [ExampleController::class, 'index']);
Route::get('/no-access', [ExampleController::class, 'noAccess'])->name('no-access');

Route::post('/create', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'loginUser']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
