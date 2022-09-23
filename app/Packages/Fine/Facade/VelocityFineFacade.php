<?php
namespace App\Packages\Fine\Facade;

use App\Packages\Fine\Domain\Model\VelocityFine;
use App\Packages\Fine\Service\VelocityFineService;

class VelocityFineFacade
{
    public function __construct(private VelocityFineService $velocityFineService)
    {
    }

    public function getVelocityFineByVelocity(int $velocity): ?VelocityFine
    {
        return $this->velocityFineService->getVelocityFineByVelocity($velocity);
    }
}
