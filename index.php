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

// Render PHP template in route
$app->any('/', function ($request, $response, $args) {
    return $this->view->render($response, 'login.php');
})->setName('login');

$app->any('/signup',function($request,$response,$args){
    return $this->view->render($response,'signup.php');
});

$app->any('/login',function($request,$response,$args){
    return $this->view->render($response,'login.php');
});

$app->any('/welcome',function($request,$response,$args){
        return $this->view->render($response,'welcome.php');
});

$app->any("/logout",function($request,$response,$args){
        session_start();
        session_destroy();
        return $this->view->render($response,'login.php');
});
$app->run();
?>