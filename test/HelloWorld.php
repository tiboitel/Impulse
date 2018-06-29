<?php

namespace ExampleApp;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HelloWorld implements RequestHandlerInterface
{
	private $message;
	private $response;

	public function __construct(string $message, ResponseInterface $reponse)
	{
		$this->message = $message;
		$this->response = $reponse;	
	}

	public function __invoke() : void
	{
		 $response = $this->response->withHeader('Content-Type', 'text/html');
		 $response->getBody()->write("<html><head></head><body>Hello, {$this->foo} world!</body></html>");
		 return $response;
	}

	public function announce()
	{
		echo "Hello World!";
	}

	public function error()
	{
		echo "An error as occured";
	}

	public function handle(ServerRequestInterface $request) : ResponseInterface
	{
		 $response = $this->response->withHeader('Content-Type', 'text/html');
		 $response->getBody()->write("<html><head></head><body>Hello, {$this->foo} world!</body></html>");
		 return $response;
	}
}
