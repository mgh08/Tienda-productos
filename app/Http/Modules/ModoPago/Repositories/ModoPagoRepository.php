<?php

namespace App\Http\Modules\ModoPago\Repositories;

use App\Http\Modules\Bases\Repositories\BaseRepository;
use App\Http\Modules\ModoPago\Model\ModoPago;

class ModoPagoRepository extends BaseRepository
{
    protected $modoPagoModel;

    public function __construct(ModoPago $modoPagoModel)
    {
        $this->modoPagoModel = $modoPagoModel;
        parent::__construct($this->modoPagoModel);
    }
}
