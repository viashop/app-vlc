<?php

namespace Vialoja\Http\Controllers\Control;

use Vialoja\Http\Controllers\Controller;
use Vialoja\Entities\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Vialoja\Authorizations\Gate\CheckGate;

/**
 * Class DashboardController
 * @package Vialoja\Http\Controllers\Control
 */
class DashboardController extends Controller
{

    use CheckGate;

    /**
     * @var User
     */
    protected $user;

    /**
     * DashboardController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return $this
     */
    public function dashboard()
    {

        SEOMeta::setTitle('Dashboard - Painel de Controle');

        $count_users = tools_convert_to_decimal_br($this->user->count(),0);

        return view('control.dashboard')->with( compact('count_users' ) );

    }

}
