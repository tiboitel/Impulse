<?php

namespace Impulse\Router;

use Psr\Http\Message\ServerRequestInterface;

class ArrayRouter implements IRouteCollectionRouter
{
	private $routes = [];

	public function getRoutes() : array
	{
		return ($this->routes);
	}

	public function addRoute(Route $route)
	{
		$this->routes[spl_object_hash($route)] = $route;
	}

	public function removeRoute(Route $route)
	{
		unset($this->routes[spl_object_hash($route)]);
	}

	public function route(ServerRequestInterface $request)
	{
		foreach ($this->routes as $route) {
			if ($route->match($request)) {
				return ($route->get_request_handler());
			}
		}
	}
}
