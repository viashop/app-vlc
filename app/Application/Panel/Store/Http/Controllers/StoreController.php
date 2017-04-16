<?php

namespace Vialoja\Application\Panel\Store\Http\Controllers;

use Illuminate\Http\Request;
use Vialoja\Core\Http\Controllers\Controller;
use Vialoja\Domains\Entities\Users\User;

class StoreController extends Controller
{
    public function index()
    {
        return User::query()->get();
    }
}
