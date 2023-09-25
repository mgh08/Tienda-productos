<?php

use App\Http\Modules\Cliente\Controller\ClienteController;
use Illuminate\Support\Facades\Route;

Route::prefix('cliente')->group(function(){
    Route::controller(ClienteController::class)->group(function(){
        Route::get('listar', 'listar');
        Route::post('crear', 'crear');
        Route::get('buscar/{id}', 'buscar');
        Route::put('editar/{id}', 'editar');
    });
});


