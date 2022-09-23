<?php

namespace Database\Seeders\Testing;

use App\Packages\AtividadeEconomica\Domain\Model\AtividadeMunicipal;
use App\Packages\Federacao\Domain\Model\Cidade;
use Carbon\Carbon;
use Doctrine\ORM\Query\ResultSetMapping;
use Illuminate\Database\Seeder;
use LaravelDoctrine\ORM\Facades\EntityManager;

class AtividadesMunicipaisSeed extends Seeder
{
    const SAO_PAULO = 'São Paulo';
    const ARQUIVOS = [
        self::SAO_PAULO => 'Testing/atividadesMunicipaisSP.tsv',
    ];
    public function run()
    {
        $this->atividadeMunicipalSeed(self::SAO_PAULO, self::ARQUIVOS[self::SAO_PAULO]);
    }

    private function atividadeMunicipalSeed(string $nomeCidade, $arquivoAtividadeMunicipalSeed)
    {
        $cidade = EntityManager::getRepository(Cidade::class)->findOneBy(['nome' => $nomeCidade]);
        $atividadesMunicipais = EntityManager::getRepository(AtividadeMunicipal::class)->findOneBy(['cidade' => $cidade]);
        if (!$atividadesMunicipais) {
            $rows = file(storage_path("seeds/"."$arquivoAtividadeMunicipalSeed"));
            foreach ($rows as $row) {
                $this->insertAtividadesMunicipais(trim($row), $cidade->getId());
            }
        }
    }

    private function insertAtividadesMunicipais($row, string $cidadeId): void
    {
        $parts = explode("\t", $row);
        $parts[3] = $cidadeId;
        $dataAgora = Carbon::now()->format(DATE_ATOM);
        $parts[4] = $dataAgora;
        $parts[5] = $dataAgora;
        $rsm = new ResultSetMapping();
        $query = EntityManager::createNativeQuery(
        /** @lang text */
            "insert into atividades_municipais (
                             id,
                             codigo,
                             descricao,
                             cidade_id,
                             created_at,
                             updated_at
                             )
                    VALUES (?,?,?,?,?,?)",
            $rsm
        );
        $parameters = [
            ...$parts
        ];

        $query->setParameters($parameters);
        $query->getResult();
    }
}
