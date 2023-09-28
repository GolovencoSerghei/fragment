<?php

namespace Fragment;

use Exception;
use Fragment\Consumer\Carrier;

class Fragment
{

    /**
     * @var Carrier
     */
    private static $client = null;

    public static function init(string $secret, array $options = []): void
    {
        self::$client = new Carrier($secret, $options);
    }

    /**
     * @throws Exception
     */
    public static function event(array $message): bool
    {
        self::checkClient();
        return self::$client->track($message);
    }

    /**
     * @throws Exception
     */
    private static function checkClient(): void
    {
        if (self::$client !== null) {
            return;
        }
        throw new Exception('Fragment::init() must be called before any other tracking method.');
    }
}