<?php

namespace Impulse\Router;

interface IDispatcher
{
	const NOT_FOUND = 0;
	const FOUND = 1;
	const METHOD_NOT_ALLOWED = 2;

	public function dispatch($http_method, $uri);
}
