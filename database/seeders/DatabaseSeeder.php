<?php

namespace Database\Seeders;

use Database\Seeders\Testing\EmpresaSeed;
use Database\Seeders\Testing\UsuarioSeed;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            PaisEstadoCidadeSeed::class,
            AtividadesMunicipaisSeed::class,
            AtividadesEconomicasSeed::class,
            EmpresaSeed::class,
            UsuarioSeed::class,
            NotificacaoTemplateSeed::class
        ]);
    }
}
