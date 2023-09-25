<?php

namespace App\Http\Modules\Factura\Repositories;

use App\Http\Modules\Bases\Repositories\BaseRepository;
use App\Http\Modules\Factura\Model\Factura;

class FacturaRepository extends BaseRepository
{
    protected $facturaModel;

    public function __construct(Factura $facturaModel)
    {
        $this->facturaModel = $facturaModel;
        parent::__construct($this->facturaModel);
    }

    /**
     * listar facturas y detalle de tabla intermedia
     *
     * @return void
     * @autor Manuela
     */
    public function listarFacturas()
    {
        return $this->facturaModel->select('facturas.id' ,'facturas.fecha', 'clientes.nombre as nombreCliente',
                                            'modo_pagos.nombre as medioPAgo', 'factura_producto.cantidad',
                                            'factura_producto.precio as totalVenta')
                                    ->join('clientes', 'clientes.id', 'facturas.cliente_id')
                                    ->join('modo_pagos','modo_pagos.id', 'facturas.modo_pago_id')
                                    ->join('factura_producto', 'factura_producto.factura_id', 'facturas.id')
                                    ->get();
    }
}
