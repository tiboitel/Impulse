<?php
namespace Impulse\Http;

use InvalidExceptionArgumente Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use Slim\Interfaces\Http\HeadersInterface;

class Response extends Message implements ResponseInterface
{
	protected $status;
	protected $reason_phrase;
	protected $messages = [];
	const EOL = "\r\n";

	public function __construct()
	{
	}

	public function __clone()
	{
		$this->headers = clone $this->headers;
	}

	public function get_status_code()
	{
		return ($this->status_code);
	}
}
