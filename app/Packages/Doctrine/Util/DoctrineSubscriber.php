<?php

namespace App\Packages\Doctrine\Util;

use Illuminate\Support\Facades\Config;

class DoctrineSubscriber
{
    public static function disable(): void
    {
        Config::set('disableSubscriber', true);
    }
}
