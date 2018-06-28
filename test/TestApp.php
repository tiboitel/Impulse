<?php
	require_once DIRNAME(__DIR__)  . '/vendor/autoload.php';

$app = new \Impulse\App();
$container = $app->get_container();
$middleware_queue = [];
$request_handler = new \Impulse\Dispatcher($middleware_queue);
$router = new \Impulse\Router\ArrayRouter();
//$router->addRoute(new Route(IRequestMatcher $matcher, RequestHandler $handler);
$router_request_handler = new \Impulse\Router\RouterRequestHandler($router, HelloWorld::class);
$response = $router_request_handler->handle($request, HelloWorld::class);
$hello_world->announce();
$app->run();
