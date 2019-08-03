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
	protected $routes = [];
	
	/**
	* Parameters from the matched route
	* @var array
	*/
	protected $params = [];
	
	/**
	* Add a route to routing table 
	* as regular expression
	* @param string $route The route url
	* @param array $params Parameters(i.e. controllers, actions)
	*
	* @return void
	*/
	
	public function add(string $route, array $params): void
	{
		$route = preg_replace('/\//','\\/',$route);
		$route = preg_replace('/\{([a-z]+)\}/', '(?<_$1>[a-z0-9-\s]+)', $route);
		$route = '/^'.$route.'$/i';
		$this->routes[$route] = $params;
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
	
	public function matchRoute(string $url): bool
	{	
		foreach($this->routes as $route => $params){
			
			if(preg_match($route, $url, $matches)){
				foreach($matches as $key => $match){
					if(is_string($key)){
						$this->params['args'][] = $match;
					}
				}
				//print_r($this->params);
				//echo '<br>';
				$this->params['controller'] = $params['controller'];
				$this->params['action'] = $params['action'];
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
	
	public function dispatch(string $url): void
	{
		if($this->matchRoute($url)){
			$controllerName = 'App\\Controllers\\'.$this->params['controller'];
			if(class_exists($controllerName)){
				
				$controller = new $controllerName();
				$actionName = $this->params['action'];
				
				if(method_exists($controller, $actionName) && is_callable([$controller, $actionName])){
					$args = $this->params['args'] ?? null;
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
	
	/**
	* Get the routes from the routing table
	*
	* @return array
	*/
	
	public function getRoutes(): array
	{
		return $this->routes;
	}
	
	/**
	* Get the matched parameters
	*
	* @return array
	*/
	
	public function getParams(): array
	{
		return $this->params;
	}
}