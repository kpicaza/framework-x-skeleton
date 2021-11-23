<?php

declare(strict_types=1);

use Laminas\ConfigAggregator\ArrayProvider;
use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;

// To enable or disable caching, set the `ConfigAggregator::ENABLE_CACHE` boolean in
// `config/autoload/local.php`.
$config = [
    'config_cache_path' => __DIR__ . '/../var/cache/config-cache.php',
];

$aggregator = new ConfigAggregator([

    // Load application config in a pre-defined order in such a way that local settings
    // overwrite global settings. (Loaded as first to last):
    //   - `*.php`
    //   - `*.global.php`
    //   - `*.local.php`
    //   - `*.dev.php`
    //   - `*.yaml`
    //   - `*.global.yaml`
    //   - `*.local.yaml`
    //   - `*.dev.yaml`
    new PhpFileProvider('./{{,*.}prod,{,*.}local,{,*.}dev}.php'),
    new ArrayProvider($config),
], $config['config_cache_path']);

return $aggregator->getMergedConfig();
