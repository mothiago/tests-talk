<?php

namespace Database\Seeders\Testing;

use App\Packages\AtividadeEconomica\Domain\Model\AtividadeEconomica;
use App\Packages\AtividadeEconomica\Domain\Model\AtividadeEconomicaEmpresa;
use App\Packages\AtividadeEconomica\Domain\Model\AtividadeMunicipal;
use App\Packages\AtividadeEconomica\Domain\Model\AtividadeMunicipalEmpresa;
use App\Packages\Base\Domain\Model\Environment;
use App\Packages\Empresa\Domain\Model\Empresa;
use App\Packages\PeopleService\Domain\Wrapper\PeopleServiceWrapperMock;
use Illuminate\Database\Seeder;
use LaravelDoctrine\ORM\Facades\EntityManager;

class EmpresaSeed extends Seeder
{
    public function run()
    {
        $cnpjApimenti = env('APIMENTI_CNPJ');
        $cnpjApresentacao = env('EMPRESA_APRESENTACAO_CNPJ');

        if (!Environment::isLocal()) {
            return;
        }

        if(!EntityManager::getRepository(Empresa::class)->findOneBy(['cnpj' => $cnpjApimenti]) instanceof Empresa) {
            $atividadeMunicipal = EntityManager::getRepository(AtividadeMunicipal::class)->findOneBy([]);
            $atividadeEconomica = EntityManager::getRepository(AtividadeEconomica::class)->findOneBy([]);
            $empresa = new Empresa(
                $cnpjApimenti,
                razaoSocial: 'APIMENTI LTDA'
            );
            /** @var PeopleServiceWrapperMock $peopleServiceWrapper */
            $peopleServiceWrapper = app(PeopleServiceWrapperMock::class);
            $personDto = $peopleServiceWrapper->get($cnpjApimenti);
            $empresa->createCartaoCnpj($personDto->toArray());
            $empresa->concluirCadastro();
            EntityManager::persist($empresa);
            $atividadeMunicipalEmpresa = new AtividadeMunicipalEmpresa($empresa, $atividadeMunicipal, $atividadeEconomica, null);
            $atividadeEconomicaEmpresa = new AtividadeEconomicaEmpresa($empresa, $atividadeEconomica);
            $empresa->addAtividadeEconomica($atividadeEconomicaEmpresa);
            $empresa->addAtividadeMunicipal($atividadeMunicipalEmpresa);
        }

        if(!EntityManager::getRepository(Empresa::class)->findOneBy(['cnpj' => $cnpjApresentacao]) instanceof Empresa) {
            $empresa = new Empresa(
                $cnpjApresentacao,
                razaoSocial: 'Empresa Apresentação'
            );
            /** @var PeopleServiceWrapperMock $peopleServiceWrapper */
            $peopleServiceWrapper = app(PeopleServiceWrapperMock::class);
            $personDto = $peopleServiceWrapper->get($cnpjApresentacao);
            $empresa->createCartaoCnpj($personDto->toArray());
            EntityManager::persist($empresa);
        }
        EntityManager::flush();
    }
}
