<?php

namespace Account\Applications\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class InvitationController extends Controller
{


    public function ss()
    {

        SEOMeta::setTitle( Config::get('constants-account.INVITATION_TITLE') );
        SEOMeta::setDescription( Config::get('constants-account.INVITATION_DESC' ) );
        SEOMeta::setCanonical(route('login'));

    }
}
