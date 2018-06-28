<?php

namespace Impulse\Router;

interface IRouteCollectionRouter extends IRouter
{
	public function addRoute(Route $route);
	public function removeRoute(Route $route);
	public function getRoutes() : array;
}
