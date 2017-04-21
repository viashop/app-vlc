<?php

namespace Vialoja\Http\Controllers\Control\User\Admin;

use Vialoja\Http\Controllers\Controller;
use Vialoja\Http\Requests\Control\User\UserRegisterRequest;
use Vialoja\Repositories\Control\User\Admin\UserAdminRepository;
use Vialoja\Entities\Role;
use Vialoja\Authorizations\Gate\CheckGate;
use Artesaos\SEOTools\Facades\SEOMeta;

/**
 * Class UserCreateController
 * @package Vialoja\Http\Controllers\Control\User\Admin
 */
class UserCreateController extends Controller
{

    use CheckGate;

    /**
     * @var UserAdminRepository
     */
    private $repository;

    /**
     * @var Role
     */
    private $role;

    /**
     * UserCreateController constructor.
     * @param Role $role
     * @param UserAdminRepository $repository
     */
    public function __construct(Role $role, UserAdminRepository $repository)
    {
        $this->role = $role;
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $this->checkPermission('add_administrator');

        SEOMeta::setTitle('Criar Usuários Administrativos');
        $roles = $this->role->all();
        return view('control.users.admin.create', compact('roles'));

    }

    /**
     * @param UserRegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createPost(UserRegisterRequest $request)
    {

        $this->checkPermission('add_administrator');

        try {
            $this->repository->createPost($request);
            return redirect()->route('control.users.admin.read')->with('success', \Config::get('constants.MSG_USER_CREATE_SUCCESS'));
        } catch (\Exception $e) {
            return redirect()->route('control.users.admin.read')->with('danger', \Config::get('constants.ERROR_PROCESS'));
        }

    }

}
