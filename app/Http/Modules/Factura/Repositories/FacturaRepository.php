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
}
