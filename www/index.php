<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Contributte\Middlewares\Application\IApplication;


App\Bootstrap::boot()
    ->createContainer()
    ->getByType(IApplication::class)
    ->run();
