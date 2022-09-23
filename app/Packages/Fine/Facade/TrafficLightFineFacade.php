<?php
namespace App\Packages\Fine\Facade;

use App\Packages\Fine\Domain\Model\TrafficLightFine;
use App\Packages\Fine\Domain\Repository\TrafficLightFineRepository;

class TrafficLightFineFacade
{
    public function __construct(private TrafficLightFineRepository $trafficLightFineRepository)
    {
    }

    public function getTrafficLightFineByColor(string $color): ?TrafficLightFine
    {
        return $this->trafficLightFineRepository->findByColor($color);
    }
}
