<?php

namespace App\Packages\Doctrine\Domain\Behavior;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

trait IdentifiableAttribute
{
    #[Id]
    #[Column(type: "uuid", unique: true)]
    #[GeneratedValue(strategy: "CUSTOM")]
    #[CustomIdGenerator(class: "Ramsey\Uuid\Doctrine\UuidGenerator")]
    protected string $id;

    public function getId(): string
    {
        return $this->id;
    }
}
