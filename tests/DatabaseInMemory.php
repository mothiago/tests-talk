<?php

namespace Tests;

use Gedmo\Loggable\LoggableListener;
use LaravelDoctrine\Extensions\ResolveUserDecorator;
use LaravelDoctrine\ORM\Facades\EntityManager;

trait DatabaseInMemory
{
    public function setUp(): void
    {
        parent::setUp();

        /*
         * Remove o Listener de Loggable do Gedmo (LogEntry)
         */
        $evm = EntityManager::getEventManager();
        foreach ($evm->getListeners() as $event => $listeners) {
            foreach ($listeners as $hash => $listener) {
                if ($listener instanceof ResolveUserDecorator || $listener instanceof LoggableListener) {
                    $evm->removeEventListener($event, $listener);
                }
            }
        }

        $this->artisan('doctrine:schema:create');
        $this->artisan('doctrine:schema:update');
        $this->artisan('db:seed --class=DatabaseTestingSeeder');
        $this->withHeaders(['Accept' => 'application/json']);
    }
}
