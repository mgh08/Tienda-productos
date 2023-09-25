<?php

namespace Database\Seeders;

use App\Http\Modules\Producto\Model\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\Response;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        try {
            $productos = [
                [
                    'nombre' => 'computador',
                    'precio' => 8000000,
                    'stock' => 20,
                    'categoria_id' => 1,

                ],
                [
                    'nombre' => 'mesa',
                    'precio' => 600000,
                    'stock' => 30,
                    'categoria_id' => 2,

                ],
                [
                    'nombre' => 'camara',
                    'precio' => 2000000,
                    'stock' => 40,
                    'categoria_id' => 1,

                ],
                [
                    'nombre' => 'papel higiénico',
                    'precio' => 8000,
                    'stock' => 50,
                    'categoria_id' => 3,

                ],
                [
                    'nombre' => 'silla',
                    'precio' => 900000,
                    'stock' => 25,
                    'categoria_id' => 2,

                ]
            ];
            foreach ($productos as $producto) {
                Producto::updateOrCreate([
                    'nombre' => $producto['nombre']
                ],[
                    'nombre' => $producto['nombre'],
                    'precio' => $producto['precio'],
                    'stock' => $producto['stock'],
                    'categoria_id' => $producto['categoria_id']
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al crear los productos'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

}
