<?php

namespace App\Packages\Traffic\Service;

use App\Packages\Fine\Domain\Model\TrafficLightFine;
use App\Packages\Traffic\Domain\Model\TrafficRadarFines;
use App\Packages\Fine\Domain\Model\VelocityFine;
use App\Packages\Fine\Facade\TrafficLightFineFacade;
use App\Packages\Fine\Facade\VelocityFineFacade;
use App\Packages\Traffic\Domain\Model\TrafficRadarResult;
use App\Packages\Traffic\Domain\Repository\TrafficRadarResultRepository;
use App\Packages\Vehicle\Domain\Model\Vehicle;

class TrafficRadarService
{
    public function __construct(
        private VelocityFineFacade $velocityFineFacade,
        private TrafficLightFineFacade $trafficLightFineFacade,
        private TrafficRadarResultRepository $trafficRadarResultRepository
    )
    {
    }

    public function vehicleBehaviourAnalysis(
        Vehicle $vehicle,
        float $velocity,
        string $trafficLightColor
    ): TrafficRadarResult
    {
        $velocityFine = $this->velocityFineFacade->getVelocityFineByVelocity($velocity);
        $trafficLightFine = $this->trafficLightFineFacade->getTrafficLightFineByColor($trafficLightColor);
        $trafficRadarResult = new TrafficRadarResult($vehicle);
        if ($velocityFine instanceof VelocityFine) {
            $trafficRadarResult->addTrafficRadarFines(new TrafficRadarFines($trafficRadarResult, $velocityFine));
        }
        if ($trafficLightFine instanceof TrafficLightFine) {
            $trafficRadarResult->addTrafficRadarFines(new TrafficRadarFines($trafficRadarResult, $trafficLightFine));
        }

        $this->trafficRadarResultRepository->add($trafficRadarResult);

        return $trafficRadarResult;
    }
}
