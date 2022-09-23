<?php

namespace App\Console\Commands;

use App\Packages\Fine\Domain\Model\VelocityFine;
use Illuminate\Console\Command;
use LaravelDoctrine\ORM\Facades\EntityManager;

class VelocityFineCreateCommand extends Command
{
    protected $signature = 'create:velocityfine';

    public function handle()
    {
        $velocityFine = new VelocityFine('Over 50 Km', 'over_50_km_limit', 50000, 50);
        EntityManager::persist($velocityFine);
        $velocityFine = new VelocityFine('Over 60 Km', 'over_60_km_limit', 60000, 60);
        EntityManager::persist($velocityFine);
        $velocityFine = new VelocityFine('Over 70 Km', 'over_70_km_limit', 70000, 70);
        EntityManager::persist($velocityFine);
        $velocityFine = new VelocityFine('Over 80 Km', 'over_80_km_limit', 80000, 80);
        EntityManager::persist($velocityFine);
        $velocityFine = new VelocityFine('Over 90 Km', 'over_90_km_limit', 90000, 90);
        EntityManager::persist($velocityFine);

        EntityManager::flush();
    }
}
