<?php
namespace App\Packages\Fine\Domain\Repository;

use App\Packages\Base\Domain\Repository\Repository;
use App\Packages\Fine\Domain\Model\TrafficLightFine;

class TrafficLightFineRepository extends Repository
{
    protected string $entityName = TrafficLightFine::class;

    public function findByColor(string $color): ?TrafficLightFine
    {
        return $this->findOneBy(['color' => $color]);
    }
}
