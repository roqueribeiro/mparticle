<?php

class MParticle
{
    const API_HOST      = 'https://s2s.mparticle.com/v2/events';
    const API_KEY       = '135d6b9d9833ca4880c7a86370a84822';
    const API_SECRET    = 'boxUZdAE4vZoAPwzijeA38JAGEVzCJlrCWgdU5luphS8FemWfxorRY4tQq2cd0w7';

    public static function auth_host()
    {
        return self::API_HOST;
    }

    public static function auth_encoded()
    {
        $key = self::API_KEY;
        $secret = self::API_SECRET;

        return base64_encode($key . ':' . $secret);
    }
}
