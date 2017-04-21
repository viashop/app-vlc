<?php

namespace Account\Applications\Http\Controllers;

use Account\Applications\Http\Request\LoginRequest;
use Account\Domains\Models\User\UserService;
use Account\Infrastructures\Storage\SessionBuilder;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Exception;


/**
 * Class LoginController
 * @package Vialoja\Http\Controllers\Account
 */
class LoginController extends Controller
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        SEOMeta::setTitle('Fazer Login');
        SEOMeta::setDescription('Entre com Login e Senha para acessar sua Conta, e gerencie sua Loja Virtual.');
        SEOMeta::setCanonical(URL::current());

        return $this->view('login');
    }

    /**
     * Authenticate User
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(LoginRequest $request)
    {

        try {

            $data = $this->service->autheticate($request);
            return $this->storageSessionBuilder($data);

        } catch (Exception $e) {

            return redirect()->back()->with('message_error', $e->getMessage());

        }

    }

}
