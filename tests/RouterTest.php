<?php
namespace Test;
use phpDocumentor\Reflection\Types\Object_;
use PHPUnit_Framework_TestCase;
use RDuuke\Router\Route;

class RouterTest extends PHPUnit_Framework_TestCase
{

    public function testGetRoute()
    {
        $path = "/foo";
        $callable = function(){
            // Do something
        };
        $this->setGetGlobals('/foo');
        $app = new \RDuuke\Router\Router($_GET['url']);
        $route = $app->get($path, $callable);
        $this->assertInstanceOf('\RDuuke\Router\Route', $route);
        $this->assertAttributeContains('foo', 'path', $route);
        $this->arrayHasKey('GET', 'routes', $app);
    }

    public function testPostRoute()
    {
        $path = "/foo";
        $callable = function(){
            // Do something
        };
        $this->setGetGlobals('/foo');
        $app = new \RDuuke\Router\Router($_GET['url']);
        $route = $app->post($path, $callable);
        
        $this->assertInstanceOf('\RDuuke\Router\Route', $route);
        $this->assertAttributeContains('foo', 'path', $route);
        $this->arrayHasKey('POST', 'routes', $app);


    }

    public function testUrl()
    {
        $path = "/foo";
        $callable = function(){
            // Do something
        };
        $this->setGetGlobals('/foo');
        $app = new \RDuuke\Router\Router($_GET['url']);
        $app->get($path, $callable, 'foo.show');
        $url = $app->url('foo.show');
        $this->assertEquals('foo', $url);
    }

    public function testWithErrorRoute()
    {
        $path = "/foo/:id";
        $callable = function(){
            // Do something
        };
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->setGetGlobals('/foo/l');
        $app = new \RDuuke\Router\Router($_GET['url']);
        $app->get($path, $callable)->with('id', '[0-9]+');
        $this->expectException('RDuuke\Router\RouterException');
        $app->run();
    }

    public function testErrorRoute()
    {
        $path = "/foo";
        $callable = function(){
            // Do something
        };
        $_SERVER['REQUEST_METHOD'] = "GET";
        $this->setGetGlobals('/fou/');
        $app = new \RDuuke\Router\Router($_GET['url']);
        $app->get($path, $callable);
        $this->expectException('RDuuke\Router\RouterException');
        $app->run();
    }

    public function testRouteController()
    {
        $path = "/foo/:id";
        $callable = "Post#show";
        $this->setGetGlobals('/foo/1');
        $app = new \RDuuke\Router\Router($_GET['url']);
        $route = $app->get($path, $callable);
        $this->assertAttributeContains('Post', 'callable', $route);
    }
    
    public function testRouteParams()
    {
        $path = "/foo/:id/:title";
        $callable = "Post#show";
        $this->setGetGlobals('/foo/l');
        $app = new \RDuuke\Router\Router($_GET['url']);
        $route = $app->get($path, $callable);
        $this->arrayHasKey('id', 'matches', $route);
        $this->arrayHasKey('title', 'matches', $route);
    }
    public function setGetGlobals($valor)
    {
        $_GET['url'] = $valor;
    }
}