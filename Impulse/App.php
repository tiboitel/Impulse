<?php
namespace Impulse;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Container\ContainerInterface;
use Impulse\Exception;

class App
{
	const VERSION = 0.1;
	private	$container;

	public function __construct($container = [])
	{
		if (is_array($container))
			$container = new Container($container);
		if (!$container instanceof ContainerInterface)
			throw new InvalidArgumentException("Excepted a ContainerInterface");
		$this->container = $container;
	}

	public function	get_container()
	{
		return ($this->container);
	}

	public function run()
	{
	}
}
