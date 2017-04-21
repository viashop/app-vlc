<?php

namespace Account\Applications\Http\Controllers;

use Illuminate\Http\Request;

class InvitationController extends Controller
{


    public function ss()
    {

        SEOMeta::setTitle('Fazer Login');
        SEOMeta::setDescription('Entre com Login e Senha para acessar sua Conta, e gerencie sua Loja Virtual.');
        SEOMeta::setCanonical(route('login'));

    }
}
