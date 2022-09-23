<?php
namespace App\Packages\Fine\Domain\Repository;

use App\Packages\Base\Domain\Repository\Repository;
use App\Packages\Fine\Domain\Model\VelocityFine;

class VelocityFineRepository extends Repository
{
    protected string $entityName = VelocityFine::class;

    public function findBySlugname(string $slugname): ?VelocityFine
    {
        return $this->findOneBy(['slugname' => $slugname]);
    }
}
