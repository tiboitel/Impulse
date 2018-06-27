<?php
/**
 * /@credits 2015 - 2018. Relay. Paul M. Jones
 */
namespace Impulse;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;

/**
 * PSR-15 request handler.
 */
class Runner extends RequestHandler
{
	public function handle(ServerRequestInterface $request) : ResponseInterface
	{
		$entry = current($this->queue);
		$middleware = call_user_func($this->resolver, $entry);
		next($this->queue);
		if ($middleware instanceof MiddlewareInterface) {
			return $middleware->process($request, $this);
		}
		return $middleware($request, $this);
	}
}
