<?php


namespace Account\Applications\Http\Service;


class RegisterUserService
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
     * Register User
     *
     * @param RegisterRequest $request
     * @return mixed
     * @throws Exception
     */
    public function register(RegisterRequest $request)
    {

        ValidatePassword::isValid($request->password);

        $user = $this->user->createData($request);
        $user->roles()->attach($this->role->getRoleForAttach());
        $data = $this->user->getFindOrFail($user->id);

        $stdClass = new stdClass();
        $stdClass->new = $data;

//        event( new EventActivityRecordUserRegistered( $stdClass ) );
//        event( new EventNotifyNewUserRegistered( $stdClass ) );

        return $data;

    }

}
