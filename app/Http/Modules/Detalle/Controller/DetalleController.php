<?php

namespace App\Http\Modules\Detalle\Controller;

use App\Http\Controllers\Controller;
use App\Http\Modules\Detalle\Model\Detalle;
use App\Http\Modules\Detalle\Repositories\DetalleRepository;
use App\Http\Modules\Detalle\Requests\ActualizarDetalleRequest;
use App\Http\Modules\Detalle\Requests\CrearDetalleRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DetalleController extends Controller
{
    protected $detalleRepository;

    /**
     * __construct de repository detalle
     *
     * @param  mixed $detalleRepository
     * @return void
     * @author Manuela
     */
    public function __construct(DetalleRepository $detalleRepository)
    {
        $this->detalleRepository = $detalleRepository;
    }

    /**
     * listar los detalles de las compras
     *
     * @return JsonResponse
     * @Manuela
     */
    public function listar(): JsonResponse
    {
        try {
            $detalles = $this->detalleRepository->listar();
            return response()->json($detalles, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al listar los detalles de las compras'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * crear un detalle de compra
     *
     * @param  mixed $request
     * @return JsonResponse
     * @author Manuela
     */
    public function crear(CrearDetalleRequest $request): JsonResponse
    {
        try {
            $detalle = $this->detalleRepository->crear($request->validated());
            return response()->json($detalle, Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al crear detalle de compra'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * editar un detalle de compra
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return JsonResponse
     * @author Manuela
     */
    public function editar(Detalle $id, ActualizarDetalleRequest $request): JsonResponse
    {
        try {
            $detalle = $this->detalleRepository->editar($id, $request->validated());
            return response()->json($detalle, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al actualizar el detalle de compra'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
