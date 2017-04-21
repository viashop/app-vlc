<?php

namespace Account\Applications\Http\Controllers;

use Illuminate\Http\Request;

class LockController extends Controller
{
    public function lock()
    {

        SEOMeta::setTitle('Fazer Login');
        SEOMeta::setDescription('Entre com Login e Senha para acessar sua Conta, e gerencie sua Loja Virtual.');
        SEOMeta::setCanonical(route('login'));
        return $this->view('lock');
    }
}
