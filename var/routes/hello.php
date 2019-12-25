<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;



/**********************************************************************
*
*   Hello routes
*
*   GET /hello          -- Generic hello
*   GET /hello/:name    -- Hello with a specified name
*
*
**********************************************************************/


$app->get('/hello', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
})->setName('hello');


$app->get('/hello/{name}', function (Request $request, Response $response, $args) {
    return $this->get('view')->render(
        $response, 'sandbox.html',
        [
            'name' => $args['name']
        ]
    );
})->setName('hello.name');
