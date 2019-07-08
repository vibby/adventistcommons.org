<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ContainerHolder
{
	private $container;
	private $containerClosures;
	private $closed = false;

	public function close(): void
	{
		$this->closed = true;
	}

	public function set( $name, closure $service ): void
	{
		if ($this->closed) {
			throw new \Exception('Cannot add services to container once it is closed');
		}

		$this->containerClosures[$name] = $service;
	}

	public function get( $name )
	{
		if (!isset($this->container[$name])) {
			if (!isset($this->containerClosures[$name])) {
				throw new \Exception(sprintf('Service does not exists : %s', $name));
			}

			$this->container[$name] = $this->containerClosures[$name]();
		}

		return $this->container[$name];
	}
}
