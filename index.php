<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'database/db.php';
require 'database/user.php';

$app = new \Slim\App;

// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('templates');
};

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});

// Render PHP template in route
$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'login.php');
})->setName('login');


$app->run();

$data = db::getPDO();

?>