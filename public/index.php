<?php
//phpinfo();
//var_dump($_SERVER['PATH_INFO']);
//var_dump($_SERVER['QUERY_STRING']);
require_once('../Core/Router.php');
use Core\Router;
$router = new Router();

$router->add('',['controller' => 'Some controller', 'action' => 'index']);
$router->add('posts',['controller' => 'Post controller', 'action' => 'posts']);

$url = isset($_SERVER['PATH_INFO']) ? str_replace('/public/','',$_SERVER['PATH_INFO']) : '';

if($url){
	$is = $router->matchRoute($url);
	if($is){
		var_dump($router->getParams());
	}
	else{
		echo 'No route has been found';
	}
}
else{
	echo 'You are in the index file';
}