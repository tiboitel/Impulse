<?php

namespace Impulse\Router;

use Psr\Http\Message\ServerRequestInterface;

interface RequestMatcherInterface
{
	public function match(ServerRequestInterface $request);
}
