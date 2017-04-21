<?php

namespace Account\Applications\Http\Controllers;

use Account\Applications\Http\Request\RegisterRequest;
use Account\Infrastructures\Storage\SessionBuilder;
use Account\Domains\Models\User\UserService;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\SEOMeta;
use Exception;

/**
 * Class RegisterController
 * @package Vialoja\Http\Controllers\Account
 */
class RegisterController extends Controller
{

    use SessionBuilder;

    /**
     * @var UserService
     */
    private $service;

    /**
     * RegisterController constructor.
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * View Register User Via Email
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        SEOMeta::setTitle('Criar conta gerenciar Loja Virtual');
        SEOMeta::setDescription('Na vialoja você encontra tudo o que precisa para abrir hoje sua loja virtual e começar a vender.');
        SEOMeta::setCanonical(URL::current());
        return $this->view('register');
    }

    /**
     * Receive Post Register New User
     * @param RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerPost(RegisterRequest $request)
    {
        try {

            $request->session()->flash('name', $request->name);
            $request->session()->flash('email', $request->email);

            $data = $this->service->register($request);
            return $this->storageSessionBuilder($data);

        } catch (Exception $e) {
            return redirect()->back()->with('message_error', $e->getMessage());
        }
    }

}
