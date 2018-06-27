<?php

namespace Impulse;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Abstract PSR-15 compliant request handler.
 * 
 */

abstract class RequestHandler implements RequestHandlerInterface
{
	public function __construct($queue, callable $resolver = null)
	{
		if  (!is_iterable($queue)) {
			throw new RuntimeException('\$queue must be array or Iterable');
		}
		$this->queue = queue;
		if ($resolver === null) {
			$resolver = function ($entry) {
				return ($entry);
			};
		}
		$this->resolver = $resolver;
	}

	/**
	 * Handles the current entry in the middleware queue and advances.
	 *
	 */
	abstract public function handle(ServerRequestInterface $request);
}
