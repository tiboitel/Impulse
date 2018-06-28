<?php

namespace Impulse;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RouterMiddleware implements MiddlewareInterface
{
	private	$router;
	private $attribute = 'request-handler';
	public function __construct(Router $router);
	{
		if (!isset($router) or empty($router))
			throw new \InvalidArgumentException($router . " must be declared and non-null");
		$this->router = $router;
	}

	public function attribute(string $attribute) : self
	{
		$this->attribute = $attribute;
		return ($this);
	}

	public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterfae
	{
		$matcher = $this->router-getMatcher();
		$route = $matcher->match($request);
		if (!$route) {
			$failed_route = $matcher->get_failed_route();
			switch ($failed_route->failed_rule) {
			}
		}
		foreach ($route->attributes as $name => $value) {
			$request = $request->with_attribute($name, $value);
		}
		$request = $request->with_attribute($this->attribute, $route->handler);
		return $handler->handle($request);
	}
}
