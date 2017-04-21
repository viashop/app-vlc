<?php

namespace Account\Applications\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Vialoja\Contracts\Repositories\Account\RecoverPasswordRepositoryInterface;
use Vialoja\Http\Requests\Account\ResetPasswordRequest;
use Vialoja\Repositories\Account\RecoverPasswordRepository;

use Artesaos\SEOTools\Facades\SEOMeta;
use Exception;


/**
 * Class ResetPasswordController
 * @package Vialoja\Http\Controllers\Account
 */
class ResetPasswordController extends Controller
{
    /**
     * @var RecoverPasswordRepository
     */
    private $repository;

    /**
     * ResetPasswordController constructor.
     * @param RecoverPasswordRepository $repository
     */
    public function __construct(RecoverPasswordRepository $repository)
    {

        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reset(Request $request)
    {

        SEOMeta::setTitle( Config::get('constant-account.RESET_TITLE') );

        $token = $request->route('token');

        if ($this->repository instanceof RecoverPasswordRepositoryInterface) {

            if (!$this->repository->isTokenResetPassord($request)) {

                $request->session()->flash('message_error_reset_password', Config::get('constants.TOKEN_INVALID_OR_NOT_FOUND'));

            }

        }

        return $this->view('reset-password', compact('token')) ;
    }


    /**
     * @param ResetPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPost(ResetPasswordRequest $request)
    {

        try {

            if ($this->repository instanceof RecoverPasswordRepositoryInterface) {

                if (!$this->repository->isTokenResetPassord($request)) {
                    throw new Exception(Config::get('constants.ERROR_PROCESS'));
                }

                $this->repository->resetPassword($request);
            }

            return redirect()->route('login')->with('message_success_reset_password', Config::get('constants.PASSWORD_CHANGE'));

        } catch (Exception $e) {

            return redirect()->back()->with('message_error', $e->getMessage());

        }

    }

}
