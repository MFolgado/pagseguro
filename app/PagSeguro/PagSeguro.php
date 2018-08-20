<?php
/**
 * Created by PhpStorm.
 * User: blit
 * Date: 17/08/2018
 * Time: 16:26
 */

namespace App\PagSeguro;

use GuzzleHttp\Client;

class PagSeguro
{
    const SESSION = 0;
    const SESSION_SANDBOX = 1;

    private $requests = [
        0 => [
            'url' => 'https://ws.pagseguro.uol.com.br/v2/sessions',
            'method' => 'POST',
            'options' => [
                'withBody' => false
            ]
        ],
        1 => [
            'url' => 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions',
            'method' => 'POST',
            'options' => [
                'withBody' => false
            ]
        ]
    ];

    public function request(int $url, array $data = [])
    {
        $request = $this->requests[$url];
        $url = $request['url'];

        $url = $url. '?' . http_build_query($data);

        $client = new Client();
        $response = $client->request($request['method'], $url);

        return $response->getBody();

    }
}
