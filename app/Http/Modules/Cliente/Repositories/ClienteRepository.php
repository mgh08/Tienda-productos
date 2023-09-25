<?php

namespace App\Http\Modules\Cliente\Repositories;

use App\Http\Modules\Bases\Repositories\BaseRepository;
use App\Http\Modules\Cliente\Model\Cliente;

class ClienteRepository extends BaseRepository
{
    protected $clienteModel;

    /**
     * __construct de modelo cliente
     *
     * @param  mixed $clienteModel
     * @return void
     */
    public function __construct(Cliente $clienteModel)
    {
        $this->clienteModel = $clienteModel;
        parent::__construct($this->clienteModel);
    }

    /**
     * listar clientes
     *
     * @return void
     * @author Manuela
     */
    public function listarClientes()
    {
        return $this->clienteModel->select('id', 'nombre', 'apellido', 'direccion', 'fecha_nacimiento', 'telefono', 'email')->get();
    }
}
