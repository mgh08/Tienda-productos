<?php

namespace App\Http\Modules\Factura\Services;

use App\Http\Modules\Factura\Model\Factura;
use App\Http\Modules\Factura\Repositories\FacturaRepository;

class FacturaService
{
    protected $facturaRepository;

    /**
     * __construct factura Repository
     *
     * @param  mixed $facturaRepository
     * @return void
     * @author Manuela
     */
    public function __construct(FacturaRepository $facturaRepository)
    {
        $this->facturaRepository = $facturaRepository;
    }

    /**
     * guardar factura y datos de tabla de pivote y decrementa el stock de producto
     *
     * @param  mixed $request
     * @return void
     * @author Manuela
     */
    public function guardarFactura($request)
    {
        $factura = Factura::create([
            'fecha'        => $request->input('fecha'),
            'cliente_id'   => $request->input('cliente_id'),
            'modo_pago_id' => $request->input('modo_pago_id')
        ]);

        if ($request->input('productos'))
        {
            $factura->productos()->attach(
                $request->input('productos'),
                ['cantidad' => $request->input('cantidad'), 'precio' => $request->input('precio')]
            );

            // $factura->productos es una relación que devuelve los productos relacionados
            foreach ($factura->productos as $producto)
            {
                //decrementa el stock individualmente
                $producto->stock -= $request->input('cantidad');
                $producto->save();
            }
        }

        return $factura;
    }

    /**
     * actualizar factura datos de la tabla pivote y el stock de producto
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     * @author Manuela
     */
    public function actualizarFactura($request, $id)
    {
        $factura = $this->facturaRepository->buscar($id);

        $factura->fecha = $request->input('fecha');
        $factura->cliente_id = $request->input('cliente_id');
        $factura->modo_pago_id = $request->input('modo_pago_id');
        $factura->save();

        if ($request->input('productos')) {
            //$factura->productos es una relación que devuelve los productos relacionados
            foreach ($factura->productos as $producto) {
                // Recupera la cantidad anterior
                $cantidadAnterior = $producto->pivot->cantidad;

                // Actualiza la cantidad en la factura
                $producto->pivot->cantidad = $request->input('cantidad');
                $producto->pivot->precio = $request->input('precio');
                $producto->pivot->save();

                // Actualiza el stock del producto
                $producto->stock += $cantidadAnterior - $request->input('cantidad');
                $producto->save();
            }
        }

        return $factura;

    }

}
