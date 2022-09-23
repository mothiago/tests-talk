<?php
namespace App\Packages\Fine\Domain\Model;

use App\Packages\Doctrine\Domain\Behavior\IdentifiableAttribute;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\Table;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[Entity]
#[InheritanceType('JOINED')]
#[Table(name: "fines")]
abstract class Fine
{
    use IdentifiableAttribute, TimestampableEntity;

    public function __construct(
        #[Column(type: "string")]
        protected string $name,
        #[Column(type: "string")]
        protected string $slugname,
        #[Column(type: "integer")]
        protected int $amount,
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlugname(): string
    {
        return $this->slugname;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }
}
