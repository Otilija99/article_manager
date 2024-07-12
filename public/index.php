<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;

// Create Container using PHP-DI
$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . '/../app/Dependencies.php');
$container = $containerBuilder->build();

// Create App
AppFactory::setContainer($container);
$app = AppFactory::create();
$callableResolver = $app->getCallableResolver();

// Register middleware
$app->addRoutingMiddleware();
$app->add(TwigMiddleware::createFromContainer($app, 'view'));
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

// Define app routes
(require __DIR__ . '/../routes.php')($app);

$app->run();
