<?php

namespace App\Packages\Base\Domain\Model;

use Illuminate\Support\Facades\App;

class Environment
{
    const
        LOCAL = 'local',
        TESTING = 'testing',
        DEV = 'development',
        HML = 'homologation',
        PRD = 'production';

    public static function isLocal(): bool
    {
        return App::environment([self::LOCAL, self::TESTING]);
    }

    public static function isDevelopment(): bool
    {
        return App::environment([self::DEV]);
    }

    public static function isHomologation(): bool
    {
        return App::environment([self::HML]);
    }

    public static function isProduction(): bool
    {
        return App::environment([self::PRD]);
    }
}
