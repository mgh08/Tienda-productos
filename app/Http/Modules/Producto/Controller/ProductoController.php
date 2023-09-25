<?php

namespace App\Http\Modules\Producto\Controller;

use App\Http\Controllers\Controller;
use App\Http\Modules\Producto\Model\Producto;
use App\Http\Modules\Producto\Repositories\ProductoRepository;
use App\Http\Modules\Producto\Requests\ActualizarProductoRequest;
use App\Http\Modules\Producto\Requests\CrearProductoRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProductoController extends Controller
{
    protected $productoRepository;

    /**
     * __construct de producto repository
     *
     * @param  mixed $productoRepository
     * @return void
     * @author Manuela
     */
    public function __construct(ProductoRepository $productoRepository)
    {
        $this->productoRepository = $productoRepository;
    }

    /**
     * listar todos los productos
     *
     * @return JsonResponse
     * @author Manuela
     */
    public function listar(): JsonResponse
    {
        try {
            $productos = $this->productoRepository->listarProductoConCategoria();
            return response()->json($productos, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al listar los productos!',
                'ERROR' => $th->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * buscar un producto
     *
     * @param  mixed $id
     * @return JsonResponse
     * @author Manuela
     */
    public function buscar(Producto $id): JsonResponse
    {
        try {
            $producto = $this->productoRepository->buscar($id);
            return response()->json($producto, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al consultar el producto!'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * crear un producto
     *
     * @param  mixed $request
     * @return JsonResponse
     * @author Manuela
     */
    public function crear(CrearProductoRequest $request): JsonResponse
    {
        try {
            $producto  = $this->productoRepository->crear($request->validated());
            return response()->json($producto, Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al intentar crear un producto!'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * editar un producto
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return JsonResponse
     * @author Manuela
     */
    public function editar(Producto $id, ActualizarProductoRequest $request): JsonResponse
    {
        try {
            $producto = $this->productoRepository->editar($id, $request->validated());
            return response()->json($producto, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'mesaje' => 'Error al intentar editar un producto!'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

}
