<?php
namespace App\Packages\Traffic\Domain\Repository;

use App\Packages\Base\Domain\Repository\Repository;
use App\Packages\Traffic\Domain\Model\TrafficRadarResult;

class TrafficRadarResultRepository extends Repository
{
    protected string $entityName = TrafficRadarResult::class;
}
