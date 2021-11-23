<?php

declare(strict_types=1);

$config = require __DIR__ . '/../config/config.php';

use Antidot\Container\Builder;

return Builder::build($config, true);