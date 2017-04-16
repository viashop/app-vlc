<?php

namespace Vialoja\Application\Api\Http\Controllers;

use Illuminate\Http\Request;
use Vialoja\Core\Http\Controllers\Controller;
use Vialoja\Domains\Entities\Users\User;

class UserAdminController extends Controller
{
    public function index()
    {
        return User::query()->get();
    }
}
