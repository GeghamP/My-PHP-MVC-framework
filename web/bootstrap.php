<?php
require_once('../autoload.php');
require_once('../vendor/autoload.php');
require_once('routes.php');
use Core\Router;
//var_dump($_SERVER['PATH_INFO']);
//echo '<br>';
$url = isset($_SERVER['PATH_INFO']) ? str_replace('/public/','',$_SERVER['PATH_INFO']) : '';
$url = trim($url, '/');
Router::dispatch($url);