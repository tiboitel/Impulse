<?php

namespace Impulse\Router;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RouterRequestHandler implements RequestHandlerInterface
{
	private $router;
	private	$failover_callback;

	public function __construct(IRouter $router, RequestHandlerInterface $request_handler)
	{
		$this->router = $router;
		$this->failover_callback = $request_handler;
	}

	public function handle(ServerRequestInterface $request)
	{
		if (($request_handler = $this->router->route($request)) === null) {
			return ($this->failover_callback->handle($request));
		}
		return ($request_handler->handle($request));
	}
}
