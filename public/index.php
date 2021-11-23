<?php

declare(strict_types=1);

use FrameworkX\App;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use function React\Async\async;

/**
 * @psalm-type Route array{handler: string, methods: string[], path: string}
 */

call_user_func(static function () {
    require __DIR__ . '/../vendor/autoload.php';
    $routes = require __DIR__ . '/../config/routes.php';
    $container = require __DIR__ . '/../config/container.php';

    $app = new App();

    /** @var Route $route */
    foreach ($routes as $route) {
        $requestHandler = function (ServerRequestInterface $request) use ($container, $route) {
            /** @var RequestHandlerInterface $handler */
            $handler = $container->get($route['handler']);
            return async(fn() => $handler->handle($request));
        };

        $app->map($route['methods'], $route['path'], $requestHandler);
    }

    $app->run();
});
