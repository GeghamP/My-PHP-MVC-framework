<?php

namespace Core;

/**
* Router
* PHP Version 7.3.6
*/

class Router
{
	/**
	* Associative array of the routes(i.e. the routing table)
	* @var array
	*/
	protected static $routes = [];
	
	/**
	* Parameters from the matched route
	* @var array
	*/
	protected static $params = [];
	
	/**
	* Add a route to routing table 
	* as regular expression
	* @param string $route The route url
	* @param array $params Parameters(i.e. controllers, actions)
	*
	* @return void
	*/
	
	public static function add(string $route, array $params): void
	{
		$route = preg_replace('/\//','\\/',$route);
		$route = preg_replace('/\{([a-z]+)\}/', '(?<_$1>[a-z0-9-\s]+)', $route);
		$route = '/^'.$route.'$/i';
		static::$routes[$route] = $params;
	}
	
	
	/**
	* Check if the route matches one of the routes
	* specified in the routing table and set the 
	* $params propety the matched route if there is a match
	*
	* @param string $url The route url
	*
	* @return boolean True if there is a match, False otherwise
	*/
	
	private static function matchRoute(string $url): bool
	{	
		foreach(static::$routes as $route => $params){
			
			if(preg_match($route, $url, $matches)){
				foreach($matches as $key => $match){
					if(is_string($key)){
						static::$params['args'][] = $match;
					}
				}
				//print_r(static::params);
				//echo '<br>';
				static::$params['controller'] = $params['controller'];
				static::$params['action'] = $params['action'];
				return true;
			}
		}
		
		return false;
	}
	
	/**
	* Dispatch the route and create the controller instance
	* and calling the corresponding method
	*
	* @param string $url The route url
	*
	* @return void
	*/
	
	public static function dispatch(string $url): void
	{
		if(static::matchRoute($url)){
			$controllerName = 'App\\Controllers\\'.static::$params['controller'];
			if(class_exists($controllerName)){
				
				$controller = new $controllerName();
				$actionName = static::$params['action'];
				
				if(method_exists($controller, $actionName) && is_callable([$controller, $actionName])){
					$args = static::$params['args'] ?? null;
					if(is_array($args) && $args){
						$controller->$actionName(...$args);
					}	
					else{
						$controller->$actionName();
					}
				}
				else{
					echo 'The method '.$actionName.' does not exist';
				}
			}
			else{
				echo 'No such class '.$controllerName.' exists';
			}
		}
		else{
			echo 'Error 404: Page does not exist';
		}
	}
}