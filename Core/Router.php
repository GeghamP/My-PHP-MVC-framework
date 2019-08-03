<?php

namespace Core;

/**
* The Router
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
	* @param string $route The route url
	* @param array $params Parameters(i.e. controllers, actions)
	*
	* @return void
	*/
	
	public function add(string $route, array $params): void
	{
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
			if($route === $url){
				$this->params = $params;
				return true;
			}
		}
		
		return false;
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