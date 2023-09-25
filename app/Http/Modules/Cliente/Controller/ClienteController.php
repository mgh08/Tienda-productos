<?php

namespace App\Http\Modules\Cliente\Controller;

use App\Http\Controllers\Controller;
use App\Http\Modules\Cliente\Model\Cliente;
use App\Http\Modules\Cliente\Repositories\ClienteRepository;
use App\Http\Modules\Cliente\Requests\ActualizarClienteRequest;
use App\Http\Modules\Cliente\Requests\CrearClienteRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClienteController extends Controller
{
    protected $clienteRepository;

    /**
     * __construct de respositorio cliente
     *
     * @param  mixed $clienteRepository
     * @return void
     * @author Manuela
     */
    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    /**
     * listar todos los clientes
     *
     * @return JsonResponse
     * @author Manuela
     */
    public function listar(): JsonResponse
    {
        try {
            $clientes = $this->clienteRepository->listarClientes();
            return response()->json($clientes, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al listar los clientes!'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * crear un cliente
     *
     * @param  mixed $request
     * @return JsonResponse
     * @author Manuela
     */
    public function crear(CrearClienteRequest $request): JsonResponse
    {
        try {
            $cliente = $this->clienteRepository->crear($request->validated());
            return response()->json($cliente, Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al crear el cliente'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * editar un cliente
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return JsonResponse
     * @author Manuela
     */
    public function editar(Cliente $id, ActualizarClienteRequest $request): JsonResponse
    {
        try {
            $cliente = $this->clienteRepository->editar($id, $request->validated());
            return response()->json($cliente, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al intentar actualizar el cliente!'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * buscar un cliente por id
     *
     * @param  mixed $id
     * @return JsonResponse
     * @author Manuela
     */
    public function buscar(Cliente $id): JsonResponse
    {
        try {
            $cliente = $this->clienteRepository->buscar($id);
            return response()->json($cliente, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al consultar el cliente!'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

}
