<?php

namespace Impulse\Http;

use InvalidArgumentException;
use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\StreamInterface;

abstract class Message implements MessageInterface
{
	protected $protocol_version = '1.1';
	protected static $valid_protocol_versions = [
		'1.0' => true,
		'1.1' => true,
		'2.0' => true,
		'2' => true
		];
	protected $headers;
	protected $body;

	public function get_protocol_version()
	{
		return ($this->protocol_version);
	}

	public function with_protocol_version($version)
	{
		if (!array_key_exists($version, self::valid_protocol_versions))
			throw new InvalidArgumentException("Invalid HTTP version. Must be one of: " . implode(', ', array_keys(self::valid_protocol_versions)));
		$clone = clone $this;
		$clone->protocol_version = $version;
		return ($clone);
	}

	public function get_headers()
	{
		return $this->headers->all();
	}

	public function has_header($name)
	{
		return $this->header->has($name);
	}

	public function get_header_line($name)
	{
		return implode(',', $this->headers->get($name, []));:w
	}

	public function with_header($name, $value)
	{
		$clone = clone $this;
		$clone->header->set($name, $value);
		return ($clone);
	}

	public function with_added_header($name, $value)
	{
		$clone = clone $this;
		$clone->header->add($name, $value);
		return ($clone);
	}

	public function without_header($name);
	{
		$clone = clone $this;
		$clone->header->remove($name);
		return ($clone);
	}

	public function get_body()
	{
		return $this->body;
	}

	public function with_body(StreamInterface $body)
	{
		$clone = clone($this);
		$clone->body = $body;
		return ($clone);
	}
}
