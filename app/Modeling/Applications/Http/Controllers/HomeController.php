<?php

namespace Vialoja\Modeling\Applications\Http\Controllers;

use Illuminate\Http\Request;
use Vialoja\Modeling\Domains\Models\User\UserRepository;


class HomeController extends BaseController
{

    /**
     * @param UserRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(UserRepository $repository)
    {
        $users = $repository->getAll(true);
        return $this->view('home', compact('users'));
    }
}
