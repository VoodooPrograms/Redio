<?php

namespace App\Mercure;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\Mercure\Jwt\TokenProviderInterface;

class MercureTokenProvider implements TokenProviderInterface
{
    private ContainerBagInterface $params;

    public function __construct(ContainerBagInterface $params)
    {
        $this->params = $params;
    }

    public function getJwt(): string
    {
        return $this->params->get('app.mercure_jwt_secret');
    }
}