<?php
require 'vendor/autoload.php';
$router = new RDuuke\Router\Router($_GET['url']);

$router->get("/", function (){
    echo "HomePage";
});

$router->get("/posts", function (){
    echo "Esto es un post";
});

$router->get("/article/:id-:slug", function ($id, $slug) use ($router) {
    echo $router->url('Posts#show', ['id' => 1, 'slug' => 'welcome']);
}, 'posts.show')->with('id', '[0-9]+')->with('slug', '([a-z\-0-9]+)');

$router->get("/posts/:id-slug", "Posts#show");
    /*<form action="" method="post" >
        <input type="text" name="title">
        <button>Enviar</button>
    </form>-*/
$router->post("/posts/:id", function ($id){
    echo "Esto es un post por metodo POST con el id: {$id} <pre>".dump($_POST)."</pre>";
});
$router->run();