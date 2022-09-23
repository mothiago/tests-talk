<?php
namespace App\Packages\Fine\Domain\Repository;

use App\Packages\Base\Domain\Repository\Repository;
use App\Packages\Fine\Domain\Model\Fine;

class FineRepository extends Repository
{
    protected string $entityName = Fine::class;
}
