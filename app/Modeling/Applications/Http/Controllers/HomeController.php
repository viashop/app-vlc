<?php

namespace Vialoja\Modeling\Applications\Http\Controllers;

use Illuminate\Http\Request;
use Vialoja\Modeling\Domains\Models\User\User;


class HomeController extends BaseController
{
    public function index()
    {
        //return User::query()->paginate(10);

        return view('modeling::home');

    }
}
