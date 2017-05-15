<?php 

namespace Vialoja\Core\Repositories\Contracts;

/**
 * Interface EloquentRepositoryInterface
 * @package Vialoja\Core\Repositories\Contracts
 */
interface EloquentRepositoryInterface
{
    /**
     * @param bool $paginate
     * @param int $take
     * @return mixed
     */
    public function getAll($paginate=false, $take=15);

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
