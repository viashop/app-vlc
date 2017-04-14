<?php

namespace Vialoja\Application\Account\Http\Controllers;

use Illuminate\Http\Request;
use Vialoja\Core\Http\Controllers\Controller;
use Vialoja\Domains\Entities\Users\User;

class AccountController extends Controller
{
    public function index()
    {
        return User::query()->get();
    }
}
