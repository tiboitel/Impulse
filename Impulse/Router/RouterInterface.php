<?php

namespace Impulse\Router;

use Psr\Http\Message\ServerRequestInterface;

interface RouterInterface
{
	public function route(ServerRequestInterface $request);
}
