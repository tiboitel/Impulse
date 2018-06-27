<?php
namespace Impulse;

use Psr\Container\ContainerInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\Container\NotFoundContainerInterface;
use Impulse\Exception\NotFoundException;

class Container implements ContainerInterface
{
	private		$definitions;
	private		$singletons;

	public function __construct($definitions = [], $singletons = [])
	{
		$this->definitions = $definitions;
		$this->singletons = $singletons;
	} 

	public function get($id)
	{
		if ($this->is_singleton($id)) {
			return ($this->singletons[$id]);
		}
		if (!$this->has($id))
		{
			if ($this->is_class_name($id)) {
				return ($this->create_definition($id));
			} else {
				throw new NotFoundException($id . " is not a valid container identifier and isn't a valid classname.");
			}
		}
		$value = $this->definitions[$id]['instance'];
		if ($this->is_class_name($value))
		{
			$instance = $this->create_definition($value);
		}
		else if ($value instanceof \Closure) {
			$instance = $value($this);
		} else 
		{
			$instance = $value;
		}
		if ($this->definitions[$id]['singleton'] === true)
			$this->singletons[$id] = $instance;
		return ($instance);
	}

	public function set($id, $instance)
	{
		$this->singletons[$id] = null;
		$this->definitions[$id] = [
			'instance' => $instance,
			'singleton' => $false
		];
	}

	public function has($id)
	{
		if (\is_array($this->definitions))
			return (\array_key_exists($id, $this->definitions));
	}

	public function set_singleton($id, $value)
	{
	}

	public function is_singleton($id)
	{
		return (isset($this->singletons[$id] ) && !empty($this->singletns[$id]));
	}

	private function is_class_name($class_name)
	{
		return (\is_string($class_name) && \class_exists($class_name));
	}

	private function create_definition($class_name)
	{
		$reflection = new \ReflectionClass($class_name);
		$arguments = [];
		if (($constructor = $reflection->getConstructor()) === NULL)
			throw new \RuntimeException("Can't find a valid constructor for the class" . $class_name);
		if (($parameters = $constructor->getParameters()) !== NULL)
		{
			foreach($constructor->getParameters() as $parameter)
			{
				if ($paramter_class = $parameter->getClass()) {
					$arguments[] = $this->get($paramaterClass->getName());
				} elseif ($paramater->isArray()) {
					$arguments[] = [];
				} elseif ($parameter->isDefaultValueAvailable()) {
					$arguments[] = $parameter->getDefaultValue();
				}
				else
					throw new \RuntimeException("Can't find a constructor for parameter:" . $parameter . "of class" . $class_name);
			}
			return ($reflection->newInstanceArgs($arguments));
		}
		return ($reflection->newInstance());
	}
}
