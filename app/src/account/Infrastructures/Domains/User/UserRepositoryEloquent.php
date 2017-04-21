<?php

namespace Account\Infrastructures\Domains\User;

use Account\Applications\Http\Request\RegisterRequest;
use Account\Domains\Models\User\User;
use Account\Domains\Models\User\UserRepository;
use Exception;
use Illuminate\Support\Facades\Config;

/**
 * Class UserRepositoryEloquent
 * @package Account\Infrastructures\Domains\User
 */
class UserRepositoryEloquent implements UserRepository
{

    /**
     * @var User
     */
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

    /**
     * @param $id
     * @return mixed
     */
    public function getFindOrFail($id)
    {
        return $this->user->findOrFail($id);
    }

    /**
     * Exist Email User
     * @param $value
     * @return mixed
     */
    public function existsEmail($value)
    {
        return $this->user->where('email', $value)->exists();
    }

    /**
     * Return data Equals
     * @param $col
     * @param $val
     * @return mixed
     */
    public function getDataEqualsFirst($column, $value)
    {
        return $this->user->where($column, '=', $value)->first();
    }

    /**
     * Register Data User
     * @param RegisterRequest $request
     * @return mixed
     */
    public function createData(RegisterRequest $request)
    {
        if ($this->existsEmail($request->email)) {
            throw new Exception( Config::get('constants.USER_IS_REGISTERED') );
        }

        return $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'verification_token' => sha1( uniqid( microtime() ) ),
            'password' => bcrypt( $request->password )
        ]);

    }

}
