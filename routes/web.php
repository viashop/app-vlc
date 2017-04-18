<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});	


Route::get('/admin', function () {
    return Request::url();
});


function pr($value='')
{
	echo "<pre>";
	print_r($value);
	echo "</pre>";
}

Route::get('/correios', function (){ 

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



    pr( Correios::frete($dados) );

    pr( Correios::cep('78053-040') );
    pr( Correios::rastrear('AA123456789BR') );
    
    /*
        Retorno:
        Array
        (
            [cliente] => 
            [logradouro] => Rua Lindolfo Kuhnen
            [bairro] => Itoupava Central
            [cep] => 89062086
            [cidade] => Blumenau
            [uf] => SC
        )
    */
});
