<?php

namespace Account\Domains\Models\User;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Account\Applications\Http\Request\RegisterRequest;
use Account\Applications\Http\Request\AuthenticateRequest;
use Account\Domains\Models\Role\RoleRepository;
use Vialoja\Helpers\ValidatePassword;


//use Vialoja\Events\Emails\EventNotifyNewUserRegistered;
//use Vialoja\Events\Logs\User\EventActivityRecordUserLogged;
//use Vialoja\Events\Logs\User\EventActivityRecordUserLoginInvalid;
//use Vialoja\Events\Logs\User\EventActivityRecordUserLoginPasswordInvalid;
//use Vialoja\Events\Logs\User\EventActivityRecordUserRegistered;


use Exception;
use stdClass;

class UserService
{

    /**
     * @var UserRepository
     */
    private $user;

    /**
     * @var RoleRepository
     */
    private $role;

    /**
     * UserService constructor.
     * @param UserRepository $user
     * @param RoleRepository $role
     */
    public function __construct(UserRepository $user, RoleRepository $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Authenticate User
     *
     * @param AuthenticateRequest $request
     * @return mixed
     * @throws Exception
     */
    public function autheticate(AuthenticateRequest $request)
    {

        $stdClass = new stdClass();

        if ($this->user->existsEmail($request->email)) {

            $data = $this->user->getDataEqualsFirst('email', $request->email);

            $stdClass->new = $data;

            if (Hash::check($request->input('password'), $data->password))
            {
                //event( new EventActivityRecordUserLogged( $stdClass ) );
                return $data;
            }

            //event(new EventActivityRecordUserLoginPasswordInvalid( $stdClass ) );

            throw new Exception( Config::get('constants.INVALID_EMAIL_OR_PASSWORD') );

        }

        $stdClass->new = ['email' => $request->email];

        //event( new EventActivityRecordUserLoginInvalid( $stdClass ) );

        throw new Exception( Config::get('constants.INVALID_EMAIL_OR_PASSWORD') );

    }

    /**
     * Register User
     *
     * @param RegisterRequest $request
     * @return mixed
     * @throws Exception
     */
    public function register(RegisterRequest $request)
    {


        dd($request);
        ValidatePassword::isValid($request->password);

        $user = $this->user->create($request);
        $user->roles()->attach($this->role->getRolePerAttach());
        $data = $this->user->getFindOrFail($user->id);

        $stdClass = new stdClass();
        $stdClass->new = $data;

//        event( new EventActivityRecordUserRegistered( $stdClass ) );
//        event( new EventNotifyNewUserRegistered( $stdClass ) );

        return $data;

    }

}
