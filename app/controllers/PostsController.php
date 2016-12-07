<?php
namespace App\Controllers;

class PostsController
{
    public function show($id)
    {
        echo "Post con id: {$id}, desde un controlador";
    }
}