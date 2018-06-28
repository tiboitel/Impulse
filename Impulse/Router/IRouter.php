<?php

namespace Impulse\Router;

use Psr\Http\Message\ServerRequestInterface;

interface IRouter
{
	public function route(ServerRequestInterface $request);
}
