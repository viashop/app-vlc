<?php

namespace Vialoja\Http\Controllers\Control\User\Shop;

use Vialoja\Http\Controllers\Controller;
use Vialoja\Http\Requests\Control\User\ShopUserRequest;
use Vialoja\Repositories\Control\User\Shop\UserShopRepository;
use Vialoja\Entities\Role;
use Artesaos\SEOTools\Facades\SEOMeta;
use Vialoja\Authorizations\Gate\CheckGate;

/**
 * Class UserUpdateController
 * @package Vialoja\Http\Controllers\Control\User\Shop
 */
class UserUpdateController extends Controller
{

    use CheckGate;

    /**
     * @var UserShopRepository
     */
    private $repository;


    private $role;

    /**
     * UserUpdateController constructor.
     * @param UserShopRepository $repository
     */
    public function __construct(Role $role, UserShopRepository $repository)
    {
        $this->repository = $repository;
        $this->role = $role;
    }

    /**
     * @param $id
     * @return $this
     */
    public function updateAdmin($id)
    {

        $this->checkPermission('edit_staff_support');

        SEOMeta::setTitle('Editando Usuários Adminstrativos');

        $type = 'admin';
        $user = $this->repository->getUser($id);

        $roles = $this->role->where('name', '=', 'shop_admin')->get();

        $roles_allowed = [];
        foreach ($user->roles as $iten) {
            array_push($roles_allowed, $iten->pivot->role_id);
        }

        return view('control.users.shops.update',compact('user', 'roles', 'type', 'roles_allowed'));
    }

    /**
     * @param $id
     * @return $this
     */
    public function updateEditor($id)
    {

        $this->checkPermission('edit_staff_support');

        SEOMeta::setTitle('Editando Usuários Editores');

        $user = $this->repository->getUser($id);
        $roles = $this->role->where('name', '=', 'shop_editor')->get();

        $roles_allowed = [];
        foreach ($user->roles as $iten) {
            array_push($roles_allowed, $iten->pivot->role_id);
        }

        return view('control.users.shops.update',compact('user', 'roles', 'type', 'roles_allowed'));
    }

    /**
     * @param ShopUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAdminPost(ShopUserRequest $request)
    {

        $this->checkPermission('edit_staff_support');

        try {

            $this->repository->updatePost($request);
            return redirect()->route('control.users.shops.admin.read')->with('success', \Config::get('constants.MSG_USER_UPDATE_SUCCESS'));

        } catch (\Exception $e) {
            return redirect()->route('control.users.shops.admin.read')->with('danger', \Config::get('constants.ERROR_PROCESS'));
        }

    }

    /**
     * @param ShopUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateEditorPost(ShopUserRequest $request)
    {

        $this->checkPermission('edit_staff_support');

        try {

            $this->repository->updatePost($request);
            return redirect()->route('control.users.shops.editor.read')->with('success', \Config::get('constants.MSG_USER_UPDATE_SUCCESS'));

        } catch (\Exception $e) {
            return redirect()->route('control.users.shops.editor.read')->with('danger', \Config::get('constants.ERROR_PROCESS'));
        }

    }

}
