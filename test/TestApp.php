<?php
require_once DIRNAME(__DIR__)  . '/vendor/autoload.php';
require_once DIRNAME(__DIR__) . '/test/HelloWorld.php';

class URIRequestMatcher implements \Impulse\Router\RequestMatcherInterface
{
	private $pattern;

	public function __construct($pattern)
	{
		$this->pattern = $pattern;
	}

	public function match(\Psr\Http\Message\ServerRequestInterface $request)
	{
		return (1 === preg_match($this->pattern, $request->getURI()->getHost()));
	}	
}

$app = new \Impulse\App();
$container = $app->get_container();
$container->set(\ExampleApp\HelloWorld::class, new \ExampleApp\HelloWorld(("Hello World!"), new HttpResponse());
$hello_world_handler = $container->get(\ExampleApp\HelloWorld::class);
$router = new \Impulse\Router\ArrayRouter();
$router->addRoute(new \Impulse\Router\Route(new URIRequestMatcher("/"), $hello_world_handler));

$middleware_queue = [];
$request_handler = new \Impulse\Dispatcher($middleware_queue);
$response = $router_request_handler->handle($request);
//$router_request_handler = new \Impulse\Router\RouterRequestHandler($router, $this);
//$hello_world->announce();
$app->run();
