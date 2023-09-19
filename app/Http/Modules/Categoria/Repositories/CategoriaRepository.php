<?php

namespace App\Http\Modules\Categoria\Repositories;

use App\Http\Modules\Bases\Repositories\BaseRepository;
use App\Http\Modules\Categoria\Model\Categoria;

class CategoriaRepository extends BaseRepository
{
    protected $categoriaModel;

    public function __construct(Categoria $categoriaModel)
    {
        $this->categoriaModel = $categoriaModel;
        parent::__construct($this->categoriaModel);
    }
}
