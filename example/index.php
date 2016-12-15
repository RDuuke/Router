<?php
require '../vendor/autoload.php';

$router = new RDuuke\Router\Router($_GET['url']);
$router->get('/', function (){
    echo "Welcome RDuuke\\Router";
});


#localhost:8080/Router/user/1 verb -> GET
#$router->get('/user/:id', function ($id){
#   echo "Parameter id: {$id}";
#});


#localhost:8080/user verb -> POST
#$router->post('/user', function ($id){
#   echo "Data of &#36;_POST : <pre>".$_POST."</pre>";
#});


#localhost:8080/article/1-Mi-Article verb GET
#$router->get('/article/:id-:slug', function ($id, $slug){
#   echo "parameter id: {$id} and slug: {$slug}";
#});


#localhost:8080/category/1 verb GET
#$router->get('/category/:id', function ($id){
#    echo "Parameter id: {$id} with validation of regular expression";
#})->with('id', '[0-9]+');


#localhost:8080/Router/controller/1
#$router->get("/controller/:id", "Posts#show");
#note: The driver must be in the app/controllers/PostsController  path


$router->run();