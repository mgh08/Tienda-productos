<?php

namespace Database\Seeders;

use App\Http\Modules\Categoria\Model\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoria = new Categoria();
        $categoria->nombre = 'tecnologia';
        $categoria->descripcion = 'implementos tecnologicos laborales';
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre = 'muebles';
        $categoria->descripcion = 'muebles para ambientes laborales';
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre = 'mercado';
        $categoria->descripcion = 'productos necesarios para el consumo laboral';
        $categoria->save();

    }
}
