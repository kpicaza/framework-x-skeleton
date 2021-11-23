<?php

declare(strict_types=1);

namespace App;

use Psr\Container\ContainerInterface;

final class HomePageFactory
{
    public function __invoke(ContainerInterface $container): HomePage
    {
        return new HomePage();
    }
}
