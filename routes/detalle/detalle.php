<?php

use App\Http\Modules\Detalle\Controller\DetalleController;
use Illuminate\Support\Facades\Route;

Route::prefix('detalle')->group(function(){
    Route::controller(DetalleController::class)->group(function(){
        Route::get('listar', 'listar');
        Route::post('crear', 'crear');
        Route::put('editar/{id}', 'editar');
    });
});
