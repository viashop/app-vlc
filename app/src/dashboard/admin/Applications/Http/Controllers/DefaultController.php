<?php

namespace Admin\Applications\Http\Controllers;

use Admin\Domains\Models\User\UserRepositoryInterface;
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
        $users = $this->user->getAll(true, 5);
        return $this->view('home', compact('users'));
    }
}
