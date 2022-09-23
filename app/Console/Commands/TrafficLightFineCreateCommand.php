<?php

namespace App\Console\Commands;

use App\Packages\Fine\Domain\Model\TrafficLightFine;
use Illuminate\Console\Command;
use LaravelDoctrine\ORM\Facades\EntityManager;

class TrafficLightFineCreateCommand extends Command
{
    protected $signature = 'create:trafficlightfine';

    public function handle()
    {
        $trafficLightFine = new TrafficLightFine('Red', 'red_light', 20000, 'red');
        EntityManager::persist($trafficLightFine);

        EntityManager::flush();
    }
}
