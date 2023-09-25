<?php

namespace Database\Seeders;

use App\Http\Modules\Cliente\Model\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\Response;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        try {
            $clientes = [
                [
                    'nombre'   =>  'Luisa',
                    'apellido'   =>  'Giraldo',
                    'direccion'   =>  'cll 40 b 30',
                    'fecha_nacimiento'   =>  '1987-10-04',
                    'telefono'   =>  305311445,
                    'email'   =>  'luisagirlaod@gmial.com'
                ],
                [
                    'nombre'   =>  'David',
                    'apellido'   =>  'Saldarriaga',
                    'direccion'   =>  'crr 48 b 20',
                    'fecha_nacimiento'   =>  '1983-03-09',
                    'telefono'   =>  301456788,
                    'email'   =>  'davidagirlaod@gmial.com'
                ],
                [
                    'nombre'   =>  'Manuela',
                    'apellido'   =>  'Giraldo',
                    'direccion'   =>  'cll 50 b 30',
                    'fecha_nacimiento'   =>  '1994-08-18',
                    'telefono'   =>  320585005,
                    'email'   =>  'manuelagirlaod@gmial.com'
                ],
                [
                    'nombre'   =>  'Luciana',
                    'apellido'   =>  'Giraldo',
                    'direccion'   =>  'cll 50 b 30',
                    'fecha_nacimiento'   =>  '2012-07-08',
                    'telefono'   =>  320585005,
                    'email'   =>  'luciana@gmial.com'
                ]
            ];
            foreach ($clientes as $cliente) {
                Cliente::updateOrCreate([
                    'nombre' => $cliente['nombre']
                ],[
                    'nombre'   =>  $cliente['nombre'],
                    'apellido'   =>  $cliente['apellido'],
                    'direccion'   =>  $cliente['direccion'],
                    'fecha_nacimiento'   =>  $cliente['fecha_nacimiento'],
                    'telefono'   =>  $cliente['telefono'],
                    'email'   =>  $cliente['email']
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al crear los clientes'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
