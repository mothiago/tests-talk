<?php
namespace App\Packages\Fine\Service;

use App\Packages\Fine\Domain\Factory\VelocityFineFactory;
use App\Packages\Fine\Domain\Model\VelocityFine;
use App\Packages\Fine\Domain\Repository\VelocityFineRepository;

class VelocityFineService
{
    public function __construct(private VelocityFineRepository $velocityFineRepository)
    {
    }

    public function getVelocityFineByVelocity(int $velocity): ?VelocityFine
    {
        $slugname = VelocityFineFactory::create($velocity);
        if (!is_null($slugname)) {
            return $this->velocityFineRepository->findBySlugname($slugname);
        }
        return null;
    }
}
