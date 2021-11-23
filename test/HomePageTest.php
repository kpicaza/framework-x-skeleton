<?php

declare(strict_types=1);

namespace App\Test;

use App\HomePage;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

final class HomePageTest extends TestCase
{
    public function testItHandleHomePageRequest(): void
    {
        $request = $this->createMock(ServerRequestInterface::class);
        $handler = new HomePage();
        $response = $handler->handle($request);

        self::assertSame(200, $response->getStatusCode());
        self::assertSame('Hello World!!!', $response->getBody()->getContents());

    }
}
