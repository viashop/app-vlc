<?php

namespace Vialoja\Modeling\Infrastructures\Domains\User;

use Vialoja\Modeling\Domains\Models\User\User;
use Vialoja\Modeling\Domains\Models\User\UserRepository;

class UserRepositoryEloquent implements UserRepository
{

    protected $user;

    /**
     * EloquentUserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get All Users
     * @param bool $paginate
     * @param int $take
     * @return array
     */
    public function getAll($paginate=false, $take=15)
    {

        $query = $this->user;

        if ($paginate) {
            return $query->paginate($take);
        }

        if (is_int($take)) {
            $query->take($take);
        }

        return $query->get();

    }

}
