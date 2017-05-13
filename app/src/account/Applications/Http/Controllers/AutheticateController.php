<?php

namespace Account\Applications\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Account\Applications\Http\Request\AuthenticateRequest;
use Account\Domains\Models\User\UserService;
use Account\Infrastructures\Storage\SessionBuilder;
use Artesaos\SEOTools\Facades\SEOMeta;
use Exception;

/**
 * Class LoginController
 * @package Vialoja\Http\Controllers\Account
 */
class AutheticateController extends Controller
{

    use SessionBuilder;

    /**
     * @var UserService
     */
    private $service;

    /**
     * LoginController constructor.
     * @param Request $request
     * @param UserService $service
     */
    public function __construct(Request $request, UserService $service)
    {
        $this->getUrlReturnSessionBuilder( $request->get('urlReturn') );
        $this->service = $service;
    }

    /**
     * View Interface Login User
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        SEOMeta::setTitle( Config::get('constants-account.LOGIN_TITLE') );
        SEOMeta::setDescription( Config::get('constants-account.LOGIN_DESC')) ;
        SEOMeta::setCanonical(URL::current());
        return $this->view('login');
    }

    /**
     * Authenticate User
     * @param AuthenticateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(AuthenticateRequest $request)
    {
        try {
            $data = $this->service->autheticate($request);
            return $this->storageSessionBuilder($data);
        } catch (Exception $e) {
            return redirect()->back()->with('message_error', $e->getMessage());
        }
    }

}
