<?php
require_once('../autoload.php');
require_once('../App/routes.php');
use Core\Router;

$url = isset($_SERVER['PATH_INFO']) ? str_replace('/public/','',$_SERVER['PATH_INFO']) : '';
Router::dispatch($url);

