<?php

namespace Impulse\Exception

final class ContainerException extends \RuntimeException implements ContainerExceptionInterface
{
	public function __construct(\Exception $previous_exception, int $code = 0)
	{

		$exception_class = \get_class($previous_exception);
		$trace = $exception_class->getTrade();
		$message = 	\sprintf(
			"Exception %s has thrown by %s::%s with message: %s",
			$exception_class,
			$trace[0]['class'],
			$trace[1]['function'],
			$previous_exception->getMessage();
		);
		parent::__construct($message, $code, $previous_exception);
	}
}
