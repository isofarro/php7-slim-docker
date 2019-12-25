<?php
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

use YourNamespace\App as TheApp;

require __DIR__ . '/vendor/autoload.php';


// Create instance of our app, and get its container
$theApp = TheApp::create();
$container = $theApp->getContainer();

// Create Slim app
AppFactory::setContainer($container);
$app = AppFactory::create();

// Set Twig to render view layer
$container->set('view', function ($container) {
    $view = Twig::create('var/views', ['cache' => false /* 'tmp/cache/views' */]);
    return $view;
});

// Add Twig-Middleware - url_for() on templates
$app->add(TwigMiddleware::createFromContainer($app));



// Service-based endpoints -- add more here
require __DIR__ . '/var/routes/hello.php';


$app->run();
