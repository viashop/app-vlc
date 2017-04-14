<?php

namespace Vialoja\Application\Panel\Wizard\Http\Controllers;

use Illuminate\Http\Request;
use Vialoja\Core\Http\Controllers\Controller;
use Vialoja\Domains\Entities\Users\User;

class WizardController extends Controller
{
    public function index()
    {
        return User::query()->get();
    }
}
