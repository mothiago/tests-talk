<?php
namespace App\Packages\Traffic\Domain\Model;

use App\Packages\Doctrine\Domain\Behavior\IdentifiableAttribute;
use App\Packages\Fine\Domain\Model\Fine;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[Entity]
#[Table(name: "traffic_radar_fines")]
class TrafficRadarFines
{
    use IdentifiableAttribute, TimestampableEntity;

    public function __construct(
        #[ManyToOne(targetEntity: TrafficRadarResult::class, fetch: "EXTRA_LAZY")]
        private TrafficRadarResult $trafficRadarResult,
        #[ManyToOne(targetEntity: Fine::class, fetch: "EXTRA_LAZY")]
        private Fine $fine
    )
    {
    }

    public function getTrafficRadarResult(): TrafficRadarResult
    {
        return $this->trafficRadarResult;
    }

    public function getFine(): Fine
    {
        return $this->fine;
    }
}
