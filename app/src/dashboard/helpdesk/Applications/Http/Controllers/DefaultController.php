<?php

namespace Helpdesk\Applications\Http\Controllers;

use Helpdesk\Domains\Models\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class DefaultController extends Controller
{

    /**
     * @var UserRepositoryInterface
     */
    private $user;

    public function __construct(UserRepositoryInterface $user)
    {

        $this->user = $user;
    }

    public function index()
    {


        dd( $this->user->getAll() );

    }
}
