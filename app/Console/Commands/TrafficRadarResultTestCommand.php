<?php

namespace App\Console\Commands;

use App\Packages\Traffic\Facade\TrafficRadarFacade;
use App\Packages\Vehicle\Domain\Model\Vehicle;
use Illuminate\Console\Command;
use LaravelDoctrine\ORM\Facades\EntityManager;

class TrafficRadarResultTestCommand extends Command
{
    protected $signature = 'radar:vehiclebehaviouranalysis';

    public function handle()
    {
        /** @var TrafficRadarFacade $trafficRadarFacade */
        /** @var Vehicle $vehicle */
        $trafficRadarFacade = app(TrafficRadarFacade::class);
        $vehicle = EntityManager::getRepository(Vehicle::class)->findOneBy([]);

        $trafficRadarFacade->vehicleBehaviourAnalysis($vehicle->getLicensePlateNumber(), 52, 'green');
        EntityManager::flush();
    }
}
