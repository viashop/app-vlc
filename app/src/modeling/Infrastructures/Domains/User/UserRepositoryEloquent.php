<?php

namespace Modeling\Infrastructures\Domains\User;

use Modeling\Domains\Models\User\User;
use Modeling\Domains\Models\User\UserRepositoryInterface;
use Vialoja\Core\Repositories\EloquentAbstractRepository;

/**
 * Class EloquentUserRepository
 * @package Modeling\Infrastructures\Domains\User
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
