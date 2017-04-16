<?php

namespace Vialoja\Application\Panel\Control\Http\Controllers;

use Illuminate\Http\Request;
use Vialoja\Core\Http\Controllers\Controller;
use Vialoja\Domains\Entities\Users\User;

class ControlController extends Controller
{
    public function index()
    {
        return User::query()->get();
    }
}
