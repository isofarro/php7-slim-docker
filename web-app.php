<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Slim\Views\TwigMiddleware;

use YourNamespace\App as TheApp;

require __DIR__ . '/vendor/autoload.php';

$theApp = TheApp::create();
$container = $theApp->getContainer();

AppFactory::setContainer($container);
$app = AppFactory::create();


// Set Twig to render view layer
$container->set('view', function ($container) {
    $view = Twig::create('var/views', ['cache' => false /* 'tmp/cache/views' */]);
    return $view;
});

// Add Twig-Middleware
$app->add(TwigMiddleware::createFromContainer($app));



// Service-based endpoints
require __DIR__ . '/var/routes/hello.php';


$app->run();
