<?php

namespace Database\Seeders\Testing;


use App\Packages\AtividadeEconomica\Domain\Model\AtividadeEconomica;
use Carbon\Carbon;
use Doctrine\ORM\Query\ResultSetMapping;
use Illuminate\Database\Seeder;
use LaravelDoctrine\ORM\Facades\EntityManager;

class AtividadesEconomicasSeed extends Seeder
{
    public function run()
    {
        $atividadesEconomicas = EntityManager::getRepository(AtividadeEconomica::class)->findOneBy([]);
        if (!$atividadesEconomicas) {
            $rows = file(storage_path("seeds/Testing/atividadesEconomicas.tsv"));

            foreach ($rows as $row) {
                $this->insertAtividadesEconomicas(trim($row));
            }

            EntityManager::flush();
        }
    }

    private function insertAtividadesEconomicas($row): void
    {
        $parts = explode("\t", $row);

        $dataAgora = Carbon::now()->format(DATE_ATOM);
        $parts[5] = $dataAgora;
        $parts[6] = $dataAgora;
        $rsm = new ResultSetMapping();
        $query = EntityManager::createNativeQuery(
        /** @lang text */
            "insert into atividades_economicas (
                             id,
                             cnae,
                             cnae_descricao,
                             nivel,
                             created_at,
                             updated_at,
                             deleted_at
                             )
                    VALUES (?,?,?,?,?,?,null)",
            $rsm
        );
        $parameters = [
            ...$parts
        ];
        $query->setParameters($parameters);
        $query->getResult();
    }
}
