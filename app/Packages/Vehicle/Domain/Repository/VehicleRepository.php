<?php
namespace App\Packages\Vehicle\Domain\Repository;

use App\Packages\Base\Domain\Repository\Repository;
use App\Packages\Vehicle\Domain\Model\Vehicle;

class VehicleRepository extends Repository
{
    protected string $entityName = Vehicle::class;

    public function findByLicensePlateNumber(string $licensePlateNumber): ?Vehicle
    {
        return $this->findOneBy(['licensePlateNumber' => $licensePlateNumber]);
    }
}
