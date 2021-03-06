# Framework X Skeleton

Project Skeleton for Framework X Apps

* [Framework X](https://framework-x.org/)
* [PSR-11 Container](https://www.php-fig.org/psr/psr-11/)
* [PSR-15 Request Handlers](https://www.php-fig.org/psr/psr-15/)
* [PSR-15 Middleware](https://www.php-fig.org/psr/psr-15/) (TODO)

## Install

## Local

```bash
git clone git@github.com:kpicaza/framework-x-skeleton.git
cd framework-x-skeleton
composer create-project
php public/index.php
```
Open your browser at http://127.0.0.1:8080.

## Docker Compose

```bash
git clone git@github.com:kpicaza/framework-x-skeleton.git
cd framework-x-skeleton
docker-compose build
docker-compose run --user=www-data --rm composer create-project
docker-compose up
```

Open your browser at http://127.0.0.1.

## Usage

### Request Handlers

It uses [PSR-15 Request Handlers](https://www.php-fig.org/psr/psr-15/) as controllers, take a look at `src/HomePage.php`

```php
<?php
// src/HomePage.php
declare(strict_types=1);

namespace App;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use RingCentral\Psr7\Response;

final class HomePage implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new Response(200, [], 'Hello World!!!');
    }
}
```

### Container

The Dependency Container uses a config style based on [Mezzio Container configuration](https://docs.mezzio.dev/mezzio/v3/features/container/config/#the-format)

```php
<?php
// config/container.php
declare(strict_types=1)

return [
    'dependencies' => [
        'factories' => [
            // service => factory pairs
            // SomePageHandler::class => SomePageHandlerFactory::class,
        ],
        'invokables' => [
            // service => instantiable class pairs
            \App\HomePage::class => \App\HomePage::class,
            // 'an-alias-for' => SomeInstantiableClass::class,
        ],
    ],
];
```

### Routing 

The routes are at `config/routes.php`, it uses an array format to define the route path, methods and the request handler.

```php
<?php
// config/routes.php
declare(strict_types=1);

use App\HomePage;

return [
    ['handler' => HomePage::class, 'methods' => ['GET'], 'path' => '/'],
];
```
