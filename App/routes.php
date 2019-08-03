<?php
use Core\Router;

Router::add('',['controller' => 'MainController', 'action' => 'index']);
Router::add('user/{id}',['controller' => 'UserController', 'action' => 'getById']);
Router::add('post/{cat}/{id}',['controller' => 'PostController', 'action' => 'getByCatAndId']);

