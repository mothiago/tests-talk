<?php

namespace Database\Seeders;

use Database\Seeders\Testing\EmpresaSeed;
use Database\Seeders\Testing\UsuarioSeed;
use Database\Seeders\Testing\PaisEstadoCidadeSeed;
use Database\Seeders\Testing\AtividadesMunicipaisSeed;
use Database\Seeders\Testing\AtividadesEconomicasSeed;
use Illuminate\Database\Seeder;
use LaravelDoctrine\ORM\Facades\EntityManager;

class DatabaseTestingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PaisEstadoCidadeSeed::class,
            AtividadesMunicipaisSeed::class,
            AtividadesEconomicasSeed::class,
            EmpresaSeed::class,
            NotificacaoTemplateSeed::class,
            UsuarioSeed::class
        ]);
        EntityManager::clear();
    }
}
