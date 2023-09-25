<?php

use App\Http\Modules\ModoPago\Controller\ModoPagoController;
use Illuminate\Support\Facades\Route;

Route::prefix('modoPago')->group(function(){
    Route::controller(ModoPagoController::class)->group(function(){
        Route::get('listar', 'listar');
        Route::post('crear', 'crear');
        Route::put('editar/{id}', 'editar');
    });
});
