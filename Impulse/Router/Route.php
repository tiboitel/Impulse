<?php

namespace Impulse\Router;

use Psr\Http\Message\ServerRequestInterface;

class Route
{
	private $matcher;
	private $handler;

	public function __construct(RequestMatcherInterface $matcher, RequestHandlerInterface $handler)
	{
		$this->matcher = $matcher;
		$this->handler = $handler;
	}

	public function match(ServerRequestInterface $request)
	{
		return ($this->matcher->match($request));
	}

	public function get_request_handler()
	{
		return ($this->handler);
	}
}
