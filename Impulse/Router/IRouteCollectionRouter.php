<?php

namespace Impulse\Router;

interface IRouteCollectionRouter extends RouterInterface
{
	public function addRoute(Route $route);
	public function removeRoute(Route $route);
	public function getRoutes() : array;
}
