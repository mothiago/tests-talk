<?php
namespace App\Packages\Vehicle\Domain\Model;

use App\Packages\Doctrine\Domain\Behavior\IdentifiableAttribute;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[Entity]
#[Table(name: "vehicles")]
class Vehicle
{
    use IdentifiableAttribute, TimestampableEntity;

    public function __construct(
        #[Column(type: "string")]
        private string $model,
        #[Column(type: "string")]
        private string $type,
        #[Column(type: "string")]
        private string $licensePlateNumber,
        #[Column(type: "integer")]
        private int $year,
    )
    {
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getLicensePlateNumber(): string
    {
        return $this->licensePlateNumber;
    }

    public function getYear(): int
    {
        return $this->year;
    }
}
