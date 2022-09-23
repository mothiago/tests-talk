<?php

namespace Database\Seeders;

use App\Packages\Federacao\Domain\Model\Cidade;
use App\Packages\Federacao\Domain\Model\Estado;
use App\Packages\Federacao\Domain\Model\Pais;
use Illuminate\Database\Seeder;
use LaravelDoctrine\ORM\Facades\EntityManager;

class PaisEstadoCidadeSeed extends Seeder
{
    public function run()
    {
        $paises = EntityManager::getRepository(Pais::class)->findOneBy([]);
        if (!$paises) {
            $pais = new Pais('Brasil', 'BRA');
            EntityManager::persist($pais);

            $estados = $this->getEstadosJson();
            $cidades = $this->getCidadesJson();

            foreach ($estados as $estado) {
                $estadoEntity = new Estado($pais, $estado['name'], $estado['abbr']);
                EntityManager::persist($estadoEntity);
                foreach ($cidades[$estado['id']] as $cidade) {
                    $cidade = new Cidade($estadoEntity, $cidade['name'], $cidade['id']);
                    EntityManager::persist($cidade);
                }
            }

            EntityManager::flush();
        }
    }

    private function getEstadosJson(): array
    {
        return json_decode(file_get_contents(storage_path("seeds/estados.json")), true);
    }

    private function getCidadesJson(): array
    {
        $cidadesJson = json_decode(file_get_contents(storage_path("seeds/cidades.json")), true);
        $cidades = [];
        foreach ($cidadesJson as $cidade) {
            $cidades[$cidade['state_id']][] = $cidade;
        }

        return $cidades;
    }
}
