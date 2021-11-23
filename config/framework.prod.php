<?php

declare(strict_types=1);

use App\HomePage;

return [
    'dependencies' => [
        'invokables' => [
            HomePage::class => HomePage::class,
        ],
    ],
];
