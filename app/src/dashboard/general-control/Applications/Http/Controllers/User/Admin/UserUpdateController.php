<?php

namespace Vialoja\Http\Controllers\Control\User\Admin;

use Vialoja\Http\Controllers\Controller;
use Vialoja\Http\Requests\Control\User\UserUpdateRequest;
use Vialoja\Entities\Role;
use Vialoja\Entities\User;
use Vialoja\Repositories\Control\User\Admin\UserAdminRepository;
use Artesaos\SEOTools\Facades\SEOMeta;
use Vialoja\Authorizations\Gate\CheckGate;

/**
 * Class UserUpdateController
 * @package Vialoja\Http\Controllers\Control\User\Admin
 */
class UserUpdateController extends Controller
{

    use CheckGate;

    /**
     * @var User
     */
    private $user;
    /**
     * @var Role
     */
    private $role;
    /**
     * @var UserAdminRepository
     */
    private $repository;


    /**
     * UserUpdateController constructor.
     * @param User $user
     * @param Role $role
     * @param UserAdminRepository $repository
     */
    public function __construct(User $user, Role $role, UserAdminRepository $repository)
    {
        $this->user = $user;
        $this->role = $role;
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return $this
     */
    public function update($id)
    {

        $this->checkPermission('edit_administrator');

        SEOMeta::setTitle('Editar Usuários Administrativos');

        $user = $this->repository->getUser($id);
        $roles = $this->role->all();

        $roles_allowed = [];
        foreach ($user->roles as $iten) {
            array_push($roles_allowed, $iten->pivot->role_id);
        }

        return view('control.users.admin.update',compact('user', 'roles', 'roles_allowed'));

    }

    /**
     * @param UserUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePost(UserUpdateRequest $request)
    {

        $this->checkPermission('edit_administrator');

        try {

            $this->repository->updatePost($request);
            return redirect()->route('control.users.admin.read')->with('success', \Config::get('constants.MSG_USER_UPDATE_SUCCESS'));

        } catch (\Exception $e) {

            return redirect()->route('control.users.admin.read')->with('danger', \Config::get('constants.ERROR_PROCESS'));
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateTrashed($id)
    {

        $this->checkPermission('edit_administrator');

        SEOMeta::setTitle('Editar Usuários Administrativos - Inativos');

        $user = $this->user->onlyTrashed()->where('id',$id)
            ->where('admin', true)->first();

        $roles = $this->role->all();

        $roles_allowed = [];
        foreach ($user->roles as $iten) {
            array_push($roles_allowed, $iten->id);
        }

        return view('control.users.admin.update-trashed',compact('user', 'roles', 'roles_allowed'));

    }

    /**
     * @param UserUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePostTrashed(UserUpdateRequest $request)
    {

        $this->checkPermission('edit_administrator');

        try {

            $this->repository->updatePostTrashed($request);
            return redirect()->route('control.users.admin.read.trashed')->with('success', \Config::get('constants.MSG_USER_UPDATE_SUCCESS'));

        } catch (\Exception $e) {
            return redirect()->route('control.users.admin.read.trashed')->with('danger', \Config::get('constants.ERROR_PROCESS'));
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreTrashed($id)
    {

        $this->checkPermission('edit_administrator');

        try {

            $task = $this->user->withTrashed()->where('id', $id);
            if($task->trashed()){
                $task->restore();
                $this->trashed = true;
                return redirect()->route('control.users.admin.read')->with('success', \Config::get('constants.MSG_USER_RESTORE_SUCCESS'));
            }

            throw new \Exception();

        } catch (\Exception $e) {
            return redirect()->route('control.users.admin.read')->with('danger', \Config::get('constants.ERROR_PROCESS'));
        }

    }

}
