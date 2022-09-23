<?php

namespace App\Packages\User\Domain\Model;

use App\Packages\Doctrine\Domain\Behavior\IdentifiableAttribute;
use Doctrine\ORM\Mapping\Entity;
use Gedmo\Mapping\Annotation\SoftDeleteable;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Illuminate\Contracts\Auth\Authenticatable;

#[Entity]
#[SoftDeleteable(fieldName: "deletedAt", timeAware: false)]
class User implements Authenticatable
{
    use IdentifiableAttribute, TimestampableEntity, SoftDeleteableEntity, \Illuminate\Auth\Authenticatable;
}
