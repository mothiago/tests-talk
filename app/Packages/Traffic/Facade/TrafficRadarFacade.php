<?php

namespace App\Packages\Traffic\Facade;

use App\Packages\Traffic\Domain\Model\TrafficRadarResult;
use App\Packages\Traffic\Service\TrafficRadarService;
use App\Packages\Vehicle\Domain\Model\Vehicle;
use App\Packages\Vehicle\Facade\VehicleFacade;

class TrafficRadarFacade
{
    public function __construct(private VehicleFacade $vehicleFacade, private TrafficRadarService $trafficRadarService)
    {
    }

    public function vehicleBehaviourAnalysis(
        string $licensePlateNumber,
        float $velocity,
        string $trafficLightColor
    ): TrafficRadarResult
    {
        $vehicle = $this->vehicleFacade->getByLicensePlateNumber($licensePlateNumber);
        if (!$vehicle instanceof Vehicle) {
            throw new \Exception('Veículo não encontrado!', 1663902955);
        }
        return $this->trafficRadarService->vehicleBehaviourAnalysis($vehicle, $velocity, $trafficLightColor);
    }
}
