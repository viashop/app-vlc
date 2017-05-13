<?php 

namespace Vialoja\Core\Repositories\Contracts;

/**
 * Interface EloquentRepositoryInterface
 * @package Vialoja\Core\Repositories\Contracts
 */
interface EloquentRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

}
