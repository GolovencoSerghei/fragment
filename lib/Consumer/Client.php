<?php

namespace Fragment\Consumer;

use GuzzleHttp\Exception\GuzzleException;

class Client
{

    /**
     * @throws GuzzleException
     */
    private function request(string $method, $url = '', array $options = [], $contentType = false): \Psr\Http\Message\ResponseInterface
    {
        $client = new \GuzzleHttp\Client();
        $headers = [
            'x-auth-user-token' => Config::$mainToken
        ];

        if ($contentType) {
            $headers['Content-Type'] = $contentType;
        }

        $defaultOptions = [
            'headers' => $headers,
            'timeout' => 60,
            'connect_timeout' => 60
        ];
        $options = array_merge_recursive($defaultOptions, $options);

        return $client->request($method, $url, $options);
    }

}