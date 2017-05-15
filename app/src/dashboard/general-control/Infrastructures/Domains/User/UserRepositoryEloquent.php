<?php

namespace Control\Infrastructures\Domains\User;

use Control\Domains\Models\User\User;
use Control\Domains\Models\User\UserRepositoryInterface;
use Vialoja\Core\Repositories\EloquentAbstractRepository;

/**
 * Class EloquentUserRepository
 * @package Control\Infrastructures\Domains\User
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
