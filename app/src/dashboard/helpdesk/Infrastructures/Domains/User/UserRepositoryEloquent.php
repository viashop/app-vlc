<?php

namespace Helpdesk\Infrastructures\Domains\User;

use Helpdesk\Domains\Models\User\User;
use Helpdesk\Domains\Models\User\UserRepositoryInterface;
use Vialoja\Core\Repositories\EloquentAbstractRepository;

/**
 * Class EloquentUserRepository
 * @package Helpdesk\Infrastructures\Domains\User
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
