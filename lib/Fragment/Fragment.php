<?php

namespace Fragment;

use Fragment\Consumer\Client;

class Fragment
{

    /**
     * @var Client
     */
    private static $client;

    public static function init(string $secret, array $options = []): void
    {
        self::$client = new Client($secret, $options);
    }

    public static function event(string $secret="", string $string=""): string
    {
        return 'event';
    }

    /**
     * @throws FragmentException
     */
    private static function checkClient(): void
    {
        if (self::$client !== null) {
            return;
        }

        throw new FragmentException('Segment::init() must be called before any other tracking method.');
    }

}