<?php

namespace App\Http\Modules\Producto\Repositories;

use App\Http\Modules\Bases\Repositories\BaseRepository;
use App\Http\Modules\Producto\Model\Producto;

class ProductoRepository extends BaseRepository
{
    protected $productoModel;

    public function __construct(Producto $productoModel)
    {
        $this->productoModel = $productoModel;
        parent::__construct($this->productoModel);
    }
}
