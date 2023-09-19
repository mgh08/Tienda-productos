<?php

namespace Database\Seeders;

use App\Http\Modules\Producto\Model\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $producto = new Producto();
        $producto->nombre = "computador";
        $producto->precio = 8000000;
        $producto->stock = 20;
        $producto->categoria_id = 1;
        $producto->save();

        $producto = new Producto();
        $producto->nombre = "mesa";
        $producto->precio = 600000;
        $producto->stock = 30;
        $producto->categoria_id = 2;
        $producto->save();

        $producto = new Producto();
        $producto->nombre = "camara";
        $producto->precio = 2000000;
        $producto->stock = 40;
        $producto->categoria_id = 1;
        $producto->save();

        $producto = new Producto();
        $producto->nombre = "papel higienico";
        $producto->precio = 8000;
        $producto->stock = 50;
        $producto->categoria_id = 3;
        $producto->save();

        $producto = new Producto();
        $producto->nombre = "silla";
        $producto->precio = 900000;
        $producto->stock = 25;
        $producto->categoria_id = 2;
        $producto->save();


    }
}
