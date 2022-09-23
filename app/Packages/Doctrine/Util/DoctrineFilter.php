<?php

namespace App\Packages\Doctrine\Util;

use LaravelDoctrine\ORM\Facades\EntityManager;

class DoctrineFilter
{
    public static function disableFilter(string $filterName): void
    {
        if (EntityManager::getFilters()->isEnabled($filterName)) {
            EntityManager::getFilters()->disable($filterName);
        }
    }
}
