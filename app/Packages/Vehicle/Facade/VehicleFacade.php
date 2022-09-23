<?php
namespace App\Packages\Vehicle\Facade;

use App\Packages\Vehicle\Domain\Model\Vehicle;
use App\Packages\Vehicle\Domain\Repository\VehicleRepository;

class VehicleFacade
{
    public function __construct(private VehicleRepository $vehicleRepository)
    {
    }

    public function getByLicensePlateNumber(string $licensePlateNumber): ?Vehicle
    {
        return $this->vehicleRepository->findByLicensePlateNumber($licensePlateNumber);
    }
}
