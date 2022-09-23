<?php
namespace App\Packages\Fine\Domain\Model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: "traffic_light_fines")]
class TrafficLightFine extends Fine
{
    public function __construct(
        #[Column(type: "string")]
        protected string $name,
        #[Column(type: "string")]
        protected string $slugname,
        #[Column(type: "integer")]
        protected int $amount,
        #[Column(type: "string")]
        private string $color
    )
    {
        parent::__construct($name, $slugname, $amount);
    }

    public function getColor(): string
    {
        return $this->color;
    }
}
