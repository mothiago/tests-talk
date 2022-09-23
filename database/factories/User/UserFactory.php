<?php

use App\Packages\Empresa\Domain\Model\Empresa;
use App\Packages\User\Domain\Model\User;
use Illuminate\Support\Str;
use LaravelDoctrine\ORM\Facades\EntityManager;

/** @var \LaravelDoctrine\ORM\Testing\Factory $factory */
$factory->define(User::class, function (\Faker\Generator $faker, array $attributes) {
    $empresa = $attributes['empresa'];
    if (!$attributes['empresa'] instanceof Empresa) {
        /** @var Empresa $empresa */
        $empresa = EntityManager::getRepository(Empresa::class)->findOneBy(['cnpj' => env('APIMENTI_CNPJ')]);
    }
    return [
        'id' => Str::uuid()->toString(),
        'empresa' => $empresa,
        'email' => fake()->safeEmail(),
        'name' => fake()->name(),
        'phoneNumber' => '99999999999',
        'password' => 'on keycloak',
    ];
});
