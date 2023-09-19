<?php

namespace App\Http\Modules\Bases\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;

    /**
     * Constructor de model
     *
     * @param  mixed $model
     * @return void
     * @author Manuela
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * listar todos los objetos del modelo
     *
     * @return void
     * @author Manuela
     */
    public function listar()
    {
        return $this->model->all();
    }

    /**
     * busca un objeto especifico del modelo por medio del id
     *
     * @param  mixed $model
     * @return void
     * @author Manuela
     */
    public function buscar($model)
    {
        return $this->model->find($model->id);
    }

    /**
     * crear un objeto nuevo con los datos recibidos
     *
     * @param  mixed $data
     * @return void
     * @author Manuela
     */
    public function crear(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * editar un objeto específico con datos recibidos, por medio de su id
     *
     * @param  mixed $model
     * @param  mixed $data
     * @return void
     * @author Manuela
     */
    public function editar($model, $data)
    {
        return $model->update($data);
    }

}
