<?php

namespace Vialoja\Core\Http\Controllers\Tests;

use Illuminate\Http\Request;
use Vialoja\Core\Http\Controllers\Controller;
use Correios;

class CorreiosController extends Controller
{


    public function pr($value='')
    {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }

    public function index()
    {
        //https://github.com/cagartner/correios-consulta



        $dados = [
            'tipo'              => 'sedex', // opções: `sedex`, `sedex_a_cobrar`, `sedex_10`, `sedex_hoje`, `pac`, 'pac_contrato', 'sedex_contrato' , 'esedex'
            'formato'           => 'caixa', // opções: `caixa`, `rolo`, `envelope`
            'cep_destino'       => '78400-000', // Obrigatório
            'cep_origem'        => '89062080', // Obrigatorio
            //'empresa'         => '', // Código da empresa junto aos correios, não obrigatório.
            //'senha'           => '', // Senha da empresa junto aos correios, não obrigatório.
            'peso'              => '1', // Peso em kilos
            'comprimento'       => '16', // Em centímetros
            'altura'            => '11', // Em centímetros
            'largura'           => '11', // Em centímetros
            'diametro'          => '0', // Em centímetros, no caso de rolo
            // 'mao_propria'       => '1', // Não obrigatórios
            // 'valor_declarado'   => '1', // Não obrigatórios
            // 'aviso_recebimento' => '1', // Não obrigatórios
        ];



        $this->pr( Correios::frete($dados) );
        $this->pr( Correios::cep('78053-040') );
        $this->pr( Correios::rastrear('PN871358668BR') );

    }
}
