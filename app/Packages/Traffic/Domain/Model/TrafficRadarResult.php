<?php

namespace App\Packages\Traffic\Domain\Model;

use App\Packages\Doctrine\Domain\Behavior\IdentifiableAttribute;
use App\Packages\Vehicle\Domain\Model\Vehicle;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[Entity]
#[Table(name: "traffic_radar_results")]
class TrafficRadarResult
{
    use IdentifiableAttribute, TimestampableEntity;

    #[OneToMany(
        mappedBy: "trafficRadarResult",
        targetEntity: TrafficRadarFines::class,
        cascade: ["all"],
        fetch: "EXTRA_LAZY"
    )]
    private Collection $trafficRadarFines;

    #[Column(type: "string")]
    private string $protocol;

    public function __construct(
        #[ManyToOne(targetEntity: Vehicle::class, fetch: "EXTRA_LAZY")]
        private Vehicle $vehicle
    )
    {
        $this->trafficRadarFines = new ArrayCollection();
        $this->generateProtocol();
    }

    public function getProtocol(): string
    {
        return $this->protocol;
    }

    public function getVehicle(): Vehicle
    {
        return $this->vehicle;
    }

    public function addTrafficRadarFines(TrafficRadarFines $trafficRadarFines): void
    {
        $this->trafficRadarFines->add($trafficRadarFines);
    }

    public function getTrafficRadarFines(): Collection
    {
        return $this->trafficRadarFines;
    }

    public function hasTrafficRadarFines(): bool
    {
        return $this->trafficRadarFines->count() > 0;
    }

    private function generateProtocol(): void
    {
        $this->protocol = sprintf("%07d", mt_rand(1, 9999999));
    }
}
