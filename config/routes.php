<?php

declare(strict_types=1);

use App\HomePage;

return [
    ['handler' => HomePage::class, 'methods' => ['GET'], 'path' => '/'],
];
