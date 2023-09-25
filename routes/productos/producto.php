<?php

use App\Http\Modules\Producto\Controller\ProductoController;
use Illuminate\Support\Facades\Route;

Route::prefix('producto')->group(function(){
    Route::controller(ProductoController::class)->group(function(){
        Route::get('listar', 'listar');
        Route::get('buscar/{id}', 'buscar');
        Route::post('crear', 'crear');
        Route::put('editar/{id}', 'editar');
    });
});
