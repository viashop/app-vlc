<?php


namespace Account\Applications\Http\Service;


class AutheticateUserService
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


}
