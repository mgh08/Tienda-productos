<?php

namespace Database\Seeders;

use App\Http\Modules\Categoria\Model\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\Response;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        try {
            $categorias = [
                [
                    'nombre' => 'tecnologia',
                    'descripcion' => 'implementos tecnologicos laborales'
                ],
                [
                    'nombre' => 'muebles',
                    'descripcion' => 'muebles para ambientes laborales'
                ],
                [
                    'nombre' => 'mercado',
                    'descripcion' => 'productos necesarios para el consumo laboral'
                ],
            ];
            foreach ($categorias as $categoria) {
                Categoria::updateOrCreate([
                    'nombre' => $categoria['nombre']
                ],[
                    'nombre' => $categoria['nombre'],
                    'descripcion' => $categoria['descripcion']
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al crear las categorías!'
            ], Response::HTTP_BAD_REQUEST);
        }

    }
}
