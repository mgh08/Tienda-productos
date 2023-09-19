<?php

namespace App\Http\Modules\Detalle\Repositories;

use App\Http\Modules\Bases\Repositories\BaseRepository;
use App\Http\Modules\Detalle\Model\Detalle;

class DetalleRepository extends BaseRepository
{
    protected $detalleModel;

    public function __construct(Detalle $detalleModel)
    {
        $this->detalleModel = $detalleModel;
        parent::__construct($this->detalleModel);
    }
}
