<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'database/UserDAO.php';

$app = new \Slim\App;

// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('templates');
};

// Render PHP template in route and Select query container
$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'login.php');
})->setName('login');

//Insert query container
$app->post("/create/username/{username}/password/{password}",function($request,$response,$args){
    $username = $request->getAttribute("username");
    $password = $request->getAttribute("password");
    echo UserDAO::saveUser($username,$password);

});

//Update query container
$app->put("/update/userid/{userid}/newusername/{newusername}/newpassword/{newpassword}",function($request,$response,$args){
    $userid = $request->getAttribute("userid");
    $newusername = $request->getAttribute("newusername");
    $newpassword = $request->getAttribute("newpassword");
    echo UserDAO::updateUser($userid,$newusername,$newpassword);
});

//Delete query container
$app->delete("/delete/userid/{userid}",function($request,$response,$args){
    $userid = $request->getAttribute("userid");
    echo UserDAO::getUserById($userid);
});

$app->get('/ALLDATA', function ($request, $response, $args) {
    UserDAO::getAllData();
});

$app->run();
?>