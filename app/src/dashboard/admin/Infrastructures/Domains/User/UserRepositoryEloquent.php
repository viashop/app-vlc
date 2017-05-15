<?php

namespace Admin\Infrastructures\Domains\User;

use Admin\Domains\Models\User\User;
use Admin\Domains\Models\User\UserRepositoryInterface;
use Vialoja\Core\Repositories\EloquentAbstractRepository;

/**
 * Class EloquentUserRepository
 * @package Admin\Infrastructures\Domains\User
 */
class EloquentUserRepository extends EloquentAbstractRepository implements UserRepositoryInterface
{

    /**
     * EloquentUserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }


}
