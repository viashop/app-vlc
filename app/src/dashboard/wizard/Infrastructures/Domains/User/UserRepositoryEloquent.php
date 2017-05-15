<?php

namespace Wizard\Infrastructures\Domains\User;

use Wizard\Domains\Models\User\User;
use Wizard\Domains\Models\User\UserRepositoryInterface;
use Vialoja\Core\Repositories\EloquentAbstractRepository;

/**
 * Class EloquentUserRepository
 * @package Wizard\Infrastructures\Domains\User
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
