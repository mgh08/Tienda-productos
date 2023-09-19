<?php

use App\Http\Modules\Categoria\Controller\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::prefix('categoria')->group(function(){
    Route::controller(CategoriaController::class)->group(function(){
        Route::get('listar', 'listar');
        Route::post('crear', 'crear');
        Route::put('editar/{id}', 'editar');
    });
});
