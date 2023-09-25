<?php

namespace Database\Seeders;

use App\Http\Modules\ModoPago\Model\ModoPago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\Response;

class ModoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        try {
            $modoPagos = [
                [
                    'nombre' => 'efectivo',
                    'otros_detalles' => 'pago en efectivo contra entrega'
                ],
                [
                    'nombre' => 'nequi',
                    'otros_detalles' => 'se despacha pedido al verificar tranferencia nequi'
                ],
                [
                    'nombre' => 'bancolombia',
                    'otros_detalles' => 'se despacha pedido al verificar tranferencia sucursal'
                ],
            ];
            foreach ($modoPagos as $modoPago) {
                ModoPago::updateOrCreate([
                    'nombre' => $modoPago['nombre']
                ],[
                    'nombre' =>  $modoPago['nombre'],
                    'otros_detalles' =>  $modoPago['otros_detalles']
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al crear medios de pago'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
