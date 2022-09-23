<?php

namespace App\Console\Commands;

use App\Packages\Vehicle\Domain\Model\Vehicle;
use Illuminate\Console\Command;
use LaravelDoctrine\ORM\Facades\EntityManager;

class VehicleCreateCommand extends Command
{
    protected $signature = 'create:vehicle';

    public function handle()
    {
        $vehicle = new Vehicle('Camaro Amarelo', 'sport', 'HX1B5678', 2018);
        EntityManager::persist($vehicle);
        $vehicle = new Vehicle('Dodge Ram', 'truck', 'AB1C2345', 2022);
        EntityManager::persist($vehicle);

        EntityManager::flush();
    }
}
