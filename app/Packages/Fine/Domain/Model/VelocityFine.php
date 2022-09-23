<?php
namespace App\Packages\Fine\Domain\Model;

use App\Packages\Doctrine\Domain\Behavior\IdentifiableAttribute;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[Entity]
#[Table(name: "velocity_fines")]
class VelocityFine extends Fine
{
    use IdentifiableAttribute, TimestampableEntity;

    const
        OVER_50_KM_LIMIT = 'over_50_km_limit',
        OVER_60_KM_LIMIT = 'over_60_km_limit',
        OVER_70_KM_LIMIT = 'over_70_km_limit',
        OVER_80_KM_LIMIT = 'over_80_km_limit',
        OVER_90_KM_LIMIT = 'over_90_km_limit';

    public function __construct(
        #[Column(type: "string")]
        protected string $name,
        #[Column(type: "string")]
        protected string $slugname,
        #[Column(type: "integer")]
        protected int $amount,
        #[Column(type: "integer")]
        protected int $velocityLimit
    )
    {
        parent::__construct($name, $slugname, $amount);
    }

    public function getVelocityLimit(): int
    {
        return $this->velocityLimit;
    }
}
