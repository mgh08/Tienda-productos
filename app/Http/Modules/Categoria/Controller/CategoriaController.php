<?php

namespace App\Http\Modules\Categoria\Controller;

use App\Http\Controllers\Controller;
use App\Http\Modules\Categoria\Model\Categoria;
use App\Http\Modules\Categoria\Repositories\CategoriaRepository;
use App\Http\Modules\Categoria\Requests\ActualizarCategoriaRequest;
use App\Http\Modules\Categoria\Requests\CrearCategoriaRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CategoriaController extends Controller
{

    protected $categoriaRepository;

    /**
     * __construct de repositorio
     *
     * @param  mixed $categoriaRepository
     * @return void
     * @author Manuela
     */
    public function __construct(CategoriaRepository $categoriaRepository)
    {
        $this->categoriaRepository = $categoriaRepository;
    }

    /**
     * listar todas las categorias
     *
     * @return JsonResponse
     * @author Manuela
     */
    public function listar(): JsonResponse
    {
        try {
            $categorias = $this->categoriaRepository->listarCategorias();
            return response()->json($categorias, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al listar categorias'
            ], Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     * crear una Categoría
     *
     * @param  mixed $request
     * @return JsonResponse
     * @author Manuela
     */
    public function crear(CrearCategoriaRequest $request): JsonResponse
    {
        try {
            $categoria = $this->categoriaRepository->crear($request->validated());
            return response()->json($categoria, Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al intentar crear una categoría.'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * editar una categoría
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return JsonResponse
     * @author Manuela
     */
    public function editar(Categoria $id, ActualizarCategoriaRequest $request): JsonResponse
    {
        try {
            $categoria = $this->categoriaRepository->editar($id, $request->validated());
            return response()->json($categoria, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al intentar actualizar el modelo.'
            ], Response::HTTP_BAD_REQUEST);
        }
    }


}
