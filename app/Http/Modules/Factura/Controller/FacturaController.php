<?php

namespace App\Http\Modules\Factura\Controller;

use App\Http\Controllers\Controller;
use App\Http\Modules\Factura\Model\Factura;
use App\Http\Modules\Factura\Repositories\FacturaRepository;
use App\Http\Modules\Factura\Services\FacturaService;
use App\Http\Modules\Factura\Requests\ActualizarFacturaRequest;
use App\Http\Modules\Factura\Requests\CrearFacturaRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class FacturaController extends Controller
{
    protected $facturaRespository;
    protected $facturaService;

    /**
     * __construct factura Repository
     *
     * @param  mixed $facturaRepository
     * @return void
     * @author Manuela
     */
    public function __construct(FacturaRepository $facturaRepository, FacturaService $facturaService)
    {
        $this->facturaRespository = $facturaRepository;
        $this->facturaService = $facturaService;
    }

    /**
     * listar todas las facturas
     *
     * @return JsonResponse
     * @author Manuela
     */
    public function listar(): JsonResponse
    {
        try {
            $factura = $this->facturaRespository->listarFacturas();
            return response()->json($factura, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(),
                'mensaje' => 'Error al listar las facturas'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * buscar una factura
     *
     * @param  mixed $id
     * @return JsonResponse
     * @author Manuela
     */
    public function buscar(Factura $id): JsonResponse
    {
        try {
            $factura = $this->facturaRespository->buscar($id);
            return response()->json($factura, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al consultar la factura!'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * crear una factura
     *
     * @param  mixed $request
     * @return JsonResponse
     * @author Manuela
     */
    public function crear(CrearFacturaRequest $request): JsonResponse
    {
        try {
            $factura = $this->facturaService->guardarFactura($request);
            return response()->json($factura, Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => $th->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * editar una factura
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return JsonResponse
     * @author Manuela
     */
    public function editar(Factura $id, ActualizarFacturaRequest $request): JsonResponse
    {
        try {
            $factura = $this->facturaService->actualizarFactura($request, $id);
            return response()->json($factura, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(),
                'mensaje' => 'Error al editar la factura'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
