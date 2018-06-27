<?php
	require_once DIRNAME(__DIR__)  . '/vendor/autoload.php';

$app = new \Impulse\App();
$container = $app->get_container();
$middleware_queue = [];
$request_handler = new \Impulse\Dispatcher($middleware_queue);
try
{
	$hello_world = $container->get(\ExampleApp\HelloWorld::class);
} catch (\Exception $e) {
	echo $e->getMessage();
}
$hello_world->announce();
$app->run();
