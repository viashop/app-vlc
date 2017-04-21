<?php

namespace Account\Applications\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class LockController extends Controller
{
    public function lock()
    {

        SEOMeta::setTitle( Config::get('constant-account.LOCK_TITLE') );
        SEOMeta::setDescription( Config::get('constant-account.LOCK_DESC' ) );
        SEOMeta::setCanonical(route('login'));
        return $this->view('lock');
    }
}
