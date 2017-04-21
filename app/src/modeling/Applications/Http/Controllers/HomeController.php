<?php

namespace Modeling\Applications\Http\Controllers;

use Illuminate\Http\Request;
use Modeling\Domains\Models\User\UserRepository;


class HomeController extends Controller
{

    /**
     * @param UserRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(UserRepository $repository)
    {
        return $repository->getAll(true);
//        $users = $repository->getAll(true);
//        return $this->view('home', compact('users'));
    }
}
