<?php
require_once('../autoload.php');
$router = new Core\Router();

$router->add('',['controller' => 'MainController', 'action' => 'index']);
$router->add('user/{id}',['controller' => 'UserController', 'action' => 'getById']);
$router->add('post/{cat}/{id}',['controller' => 'PostController', 'action' => 'getByCatAndId']);
//print_r($router->getRoutes());
//die;
$url = isset($_SERVER['PATH_INFO']) ? str_replace('/public/','',$_SERVER['PATH_INFO']) : '';
$router->dispatch($url);

echo "<br>";

/*$str = 'ap and 58';
$str = preg_replace('/(\w+) and (\d+)/','$2 or $1',$str);
var_dump($str);*/