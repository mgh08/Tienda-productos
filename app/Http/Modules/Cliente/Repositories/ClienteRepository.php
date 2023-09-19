<?php

namespace App\Http\Modules\Cliente\Repositories;

use App\Http\Modules\Bases\Repositories\BaseRepository;
use App\Http\Modules\Cliente\Model\Cliente;

class ClienteRepository extends BaseRepository
{
    protected $clienteModel;

    public function __construct(Cliente $clienteModel)
    {
        $this->clienteModel = $clienteModel;
        parent::__construct($this->clienteModel);
    }
}
