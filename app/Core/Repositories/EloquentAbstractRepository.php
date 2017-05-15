<?php

namespace Vialoja\Core\Repositories;

use Vialoja\Core\Repositories\Contracts\EloquentRepositoryInterface;

/**
 * Class EloquentAbstractRepository
 * @package Vialoja\Core\Repositories
 */
abstract class EloquentAbstractRepository implements EloquentRepositoryInterface
{

    /**
     * @var
     */
    protected $model;

    /**
     * Get All Data
     * @param bool $paginate
     * @param int $take
     * @return mixed
     */
    public function getAll($paginate=false, $take=15)
    {

        $query = $this->model;

        if ($paginate) {
            return $query->paginate($take);
        }

        if (is_int($take)) {
            $query->take($take);
        }

        return $query->get();

    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
    
}
