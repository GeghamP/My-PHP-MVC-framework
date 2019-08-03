<?php
require_once('../App/Controllers/MainController.php');
require_once('../Core/Router.php');
use Core\Router;
$router = new Router();
$router->add('',['controller' => 'MainController', 'action' => 'index']);
$router->add('home/about',['controller' => 'home', 'action' => 'index']);
$router->add('posts',['controller' => 'posts', 'action' => 'all']);
$router->add('user/{id}',['controller' => 'users', 'action' => 'getById']);
$url = isset($_SERVER['PATH_INFO']) ? str_replace('/public/','',$_SERVER['PATH_INFO']) : '';

$is = $router->dispatch($url);

/*echo "<br>";

$str = 'ap and 58';
$str = preg_replace('/(\w+) and (\d+)/','$2 or $1',$str);
var_dump($str);*/