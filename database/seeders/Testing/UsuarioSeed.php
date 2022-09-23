<?php

namespace Database\Seeders\Testing;

use App\Packages\Base\Domain\Model\Environment;
use App\Packages\Empresa\Domain\Model\Empresa;
use App\Packages\User\Domain\Model\User;
use Illuminate\Database\Seeder;
use LaravelDoctrine\ORM\Facades\EntityManager;

class UsuarioSeed extends Seeder
{
    public function run(): void
    {
        $userId = '1274914c-d490-4a38-8bb7-95da165d64da';

        if (!Environment::isLocal() || EntityManager::getRepository(User::class)->findOneBy(['id' => $userId]) instanceof User) {
            return;
        }

        $empresa = EntityManager::getRepository(Empresa::class)->findOneBy(['cnpj' => '11098046000101']);
        $email = 'meiaccountant@test.com.br';
        $name = 'Mei accountant';
        $telefone = '11987654321';
        $user = new User(
            $userId,
            $empresa,
            $email,
            $name,
            $telefone
        );

        EntityManager::persist($user);
        EntityManager::flush();
    }
}
