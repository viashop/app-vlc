<?php

namespace Vialoja\Http\Controllers\Control\User\Admin;

use Vialoja\Http\Controllers\Controller;
use Vialoja\Repositories\Control\User\Admin\UserAdminRepository;
use Vialoja\Authorizations\Gate\CheckGate;
use Vialoja\Entities\User;
use Exception;

/**
 * Class UserDeleteController
 * @package Vialoja\Http\Controllers\Control\User
 */
class UserDeleteController extends Controller
{

    use CheckGate;

    /**
     * @var User
     */
    private $user;
    /**
     * @var UserAdminRepository
     */
    private $repository;

    /**
     * UserDeleteController constructor.
     * @param UserAdminRepository $repository
     */
    public function __construct(User $user, UserAdminRepository $repository)
    {

        $this->user = $user;
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {

        $this->checkPermission('delete_administrator');

        try {

            if ($id <= 6) {
                throw new Exception();
            }

            $this->user->destroy($id);

            return redirect()->back()->with('success', \Config::get('constants.MSG_USER_REMOVE_SUCCESS'));

        } catch (Exception $e) {
            return redirect()->back()->with('danger', \Config::get('constants.ERROR_PROCESS'));
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteTrashed($id)
    {

        $this->checkPermission('delete_administrator');

        try {

            $task = $this->user->withTrashed()->findOrFail($id);
            if (!$task->trashed()) {
                $task->delete();
            } else {
                $task->forceDelete();
            }

            return redirect()->route('control.users.admin.read.trashed')->with('success', \Config::get('constants.MSG_USER_REMOVE_SUCCESS'));

        } catch (Exception $e) {

            return redirect()->route('control.users.admin.read.trashed')->with('danger', \Config::get('constants.ERROR_PROCESS'));
        }

    }

}
