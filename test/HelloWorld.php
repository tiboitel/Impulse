<?php

namespace ExampleApp;

class HelloWorld
{
	public function __construct()
	{
	}

	public function __invoke() : void
	{
		echo "Hello, autoloaded world!";
	}

	public function announce()
	{
		echo "Hello World!";
	}

	public function error()
	{
		echo "An error as occured";
	}
}
