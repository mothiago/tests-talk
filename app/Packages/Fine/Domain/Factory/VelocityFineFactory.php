<?php
namespace App\Packages\Fine\Domain\Factory;

use App\Packages\Fine\Domain\Model\VelocityFine;

class VelocityFineFactory
{
    public static function create(int $velocity): ?string
    {
        try {
            return match (true) {
                $velocity >= 50 && $velocity < 60 => VelocityFine::OVER_50_KM_LIMIT,
                $velocity >= 60 && $velocity < 70 => VelocityFine::OVER_60_KM_LIMIT,
                $velocity >= 70 && $velocity < 80 => VelocityFine::OVER_70_KM_LIMIT,
                $velocity >= 80 && $velocity < 90 => VelocityFine::OVER_80_KM_LIMIT,
                $velocity >= 90 => VelocityFine::OVER_90_KM_LIMIT,
            };
        } catch (\UnhandledMatchError $unhandledMatchError) {
            return null;
        }
    }
}
