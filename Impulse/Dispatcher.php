<?php

namespace Impulse;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class Dispatcher extends RequestHandler
{
	public function handle(ServerRequestInterface $request)
	{
		reset($this->queue);
		$runner = new Runner($this->queue, $this->resolver);
		return ($runner->handle($request));
	}
}
