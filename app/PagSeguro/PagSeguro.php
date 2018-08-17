<?php
/**
 * Created by PhpStorm.
 * User: blit
 * Date: 17/08/2018
 * Time: 16:26
 */

namespace App\PagSeguro;


class PagSeguro
{
    const SESSION = 0;
    const SESSION_SANDBOX = 0;

    private $request = [
        0 => [
            'url' => 'https://ws.pagseguro.uol.com.br/v2/sessions?{{credenciais}}',
            'method' => 'POST',
            'options' => [
                'withBody' => false
            ]
        ],
        1 => [
            'url' => 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?{{credenciais}}',
            'method' => 'POST',
            'options' => [
                'withBody' => false
            ]
        ]
    ];
}
