<?php

namespace Database\Seeders;

use App\Packages\Notificacao\Domain\Model\NotificacaoTemplate;
use App\Packages\Notificacao\Domain\Model\VerificacaoEmpresa\VerificacaoEmpresaTemplate;
use Illuminate\Database\Seeder;
use LaravelDoctrine\ORM\Facades\EntityManager;

class NotificacaoTemplateSeed extends Seeder
{
    public function run(): void
    {
        $this->criarSeedVerificacaoEmpresaTemplate();
        EntityManager::flush();
    }

    public function criarSeedVerificacaoEmpresaTemplate(): void
    {
        $notificacaoTemplate = EntityManager::getRepository(NotificacaoTemplate::class)->findOneBy(['slugname' => NotificacaoTemplate::VERIFICACAO_EMPRESA_TEMPLATE]);
        if (!$notificacaoTemplate instanceof VerificacaoEmpresaTemplate) {
            $notificacaoTemplate = new VerificacaoEmpresaTemplate(
                VerificacaoEmpresaTemplate::NOME,
                NotificacaoTemplate::VERIFICACAO_EMPRESA_TEMPLATE,
                VerificacaoEmpresaTemplate::ASSUNTO,
                VerificacaoEmpresaTemplate::EMAIL_VIEW,
                VerificacaoEmpresaTemplate::SMS_VIEW,
            );

            EntityManager::persist($notificacaoTemplate);
        }
    }
}
