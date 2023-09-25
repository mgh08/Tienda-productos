<?php

use App\Http\Modules\Factura\Controller\FacturaController;
use Illuminate\Support\Facades\Route;

Route::prefix('factura')->group(function(){
    Route::controller(FacturaController::class)->group(function(){
        Route::get('listar', 'listar');
        Route::get('buscar/{id}', 'buscar');
        Route::post('crear', 'crear');
        Route::put('editar/{id}', 'editar');
    });
});
