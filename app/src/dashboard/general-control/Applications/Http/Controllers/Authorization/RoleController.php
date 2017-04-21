<?php

namespace Vialoja\Http\Controllers\Control\Authorization;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Artesaos\SEOTools\Facades\SEOMeta;
use Vialoja\Authorizations\Gate\CheckGate;
use Vialoja\Http\Controllers\Controller;
use Vialoja\Http\Requests\Control\Authorization\RoleRequest;
use Vialoja\Http\Requests\Control\Authorization\RoleUpdateRequest;
use Vialoja\Repositories\Control\RoleRepository;
use Vialoja\Services\Control\RoleService;

class RoleController extends Controller
{

    use CheckGate;

    /**
     * @var RoleRepository
     */
    private $repository;

    /**
     * @var RoleService
     */
    private $service;


    /**
     * RoleController constructor.
     * @param RoleRepository $repository
     * @param RoleService $service
     */
    public function __construct(RoleRepository $repository, RoleService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function read(Request $request)
    {

        $this->checkPermission('read_staff_auditor');
        SEOMeta::setTitle('Funções');

        $search = $request->get('search');
        $roles = $this->repository->read($search);

        return view('control.authorization.role.read', compact('roles', 'search'));

    }


    /**
     * Create new Role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $this->checkPermission('add_administrator');
        SEOMeta::setTitle('Criar Funções');

        return view('control.authorization.role.create');

    }


    /**
     * Receive Post New Role
     * @param RoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createPost(RoleRequest $request)
    {

        $this->checkPermission('add_administrator');

        try {

            $this->service->create($request);
            return redirect()->route('control.authorization.role.read.search', $request->input('description'))->with('success', Config::get('constants.MSG_DATA_REGISTERED_SUCCESS'));

        } catch (Exception $e) {
            return redirect()->route('control.authorization.role.read')->with('danger', Config::get('constants.ERROR_PROCESS'));
        }

    }

    /**
     * Update Role
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id)
    {

        $this->checkPermission('edit_administrator');
        SEOMeta::setTitle('Editar Função');

        $role = $this->repository->findOrFail($id);
        return view('control.authorization.role.update', compact('role'));

    }

    /**
     * Receive Post Update data Role
     * @param RoleUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePost(RoleUpdateRequest $request)
    {

        $this->checkPermission('edit_administrator');

        try {

            $this->service->update($request);
            return redirect()->route('control.authorization.role.read')->with('success', Config::get('constants.MSG_USER_UPDATE_SUCCESS'));

        } catch (Exception $e) {
            return redirect()->route('control.authorization.role.read')->with('danger', Config::get('constants.ERROR_PROCESS'));
        }

    }

    /**
     * Delete Role
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {

        $this->checkPermission('delete_administrator');
        try {
            $this->service->delete($id);
            return redirect()->back()->with('success', Config::get('constants.MSG_DATA_REMOVED_SUCCESS'));
        } catch (Exception $e) {
            return redirect()->back()->with('danger', Config::get('constants.ERROR_PROCESS'));
        }

    }

}
