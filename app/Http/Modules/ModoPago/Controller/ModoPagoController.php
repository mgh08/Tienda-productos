<?php

namespace App\Http\Modules\ModoPago\Controller;

use App\Http\Controllers\Controller;
use App\Http\Modules\ModoPago\Model\ModoPago;
use App\Http\Modules\ModoPago\Repositories\ModoPagoRepository;
use App\Http\Modules\ModoPago\Requests\ActualizarModoPagoRequest;
use App\Http\Modules\ModoPago\Requests\CrearModoPagoRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ModoPagoController extends Controller
{
    protected $modoPagoRepository;

    /**
     * __construct de modo de pago Repository
     *
     * @param  mixed $modoPagoRepository
     * @return void
     * @author Manuela
     */
    public function __construct(ModoPagoRepository $modoPagoRepository)
    {
        $this->modoPagoRepository = $modoPagoRepository;
    }

    /**
     * listar los medios de pago
     *
     * @return JsonResponse
     * @author Manuela
     */
    public function listar(): JsonResponse
    {
        try {
            $modoPagos =  $this->modoPagoRepository->listarModoPagos();
            return response()->json($modoPagos, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al listar los modos de pago!'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * crear un medio de pago
     *
     * @param  mixed $request
     * @return JsonResponse
     * @author Manuela
     */
    public function crear(CrearModoPagoRequest $request): JsonResponse
    {
        try {
            $modoPago = $this->modoPagoRepository->crear($request->validated());
            return response()->json($modoPago, Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al crear medio de pago!'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * editar un medio de pago
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return JsonResponse
     * @author Manuela
     */
    public function editar(ModoPago $id, ActualizarModoPagoRequest $request): JsonResponse
    {
        try {
            $modoPago = $this->modoPagoRepository->editar($id, $request->validated());
            return response()->json($modoPago, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al editar un medio de pago!'
            ], Response::HTTP_BAD_REQUEST);
        }
    }


}
