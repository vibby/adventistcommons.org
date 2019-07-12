<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Container
{
	private $container;
	private $containerClosures;
	private $closed = false;

	public function init()
	{
		$CI =& get_instance();
		$CI->load->model('ion_auth_model');
		$CI->load->model('product_model');
		$CIclasses = [
			Product_model::class  => $CI->product_model,
			Ion_auth_model::class => $CI->ion_auth_model,
		];

		/****************************
		 * CODE IGNITER MODELS
		 ****************************/
		foreach ($CIclasses as $className => $object) {
			$this->set($className, $object);
		}

		/****************************
		 * HYDRATORS
		 ****************************/
		$this->set(
			\AdventistCommons\Domain\EntityBuilder\LanguageHydrator::class,
			function () {
				return new \AdventistCommons\Domain\EntityBuilder\LanguageHydrator();
			}
		);
		$this->set(
			\AdventistCommons\Domain\EntityBuilder\SeriesHydrator::class,
			function () {
				return new \AdventistCommons\Domain\EntityBuilder\SeriesHydrator();
			}
		);
		$this->set(
			\AdventistCommons\Domain\EntityBuilder\ProjectHydrator::class,
			function () {
				return new \AdventistCommons\Domain\EntityBuilder\ProjectHydrator(
					$this->get(\AdventistCommons\Domain\EntityBuilder\LanguageHydrator::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\EntityBuilder\ProductAttachmentHydrator::class,
			function () {
				return new \AdventistCommons\Domain\EntityBuilder\ProductAttachmentHydrator(
					$this->get(\AdventistCommons\Domain\EntityBuilder\LanguageHydrator::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\EntityBuilder\ProductHydrator::class,
			function () {
				return new \AdventistCommons\Domain\EntityBuilder\ProductHydrator(
					$this->get(\AdventistCommons\Domain\EntityBuilder\ProjectHydrator::class),
					$this->get(\AdventistCommons\Domain\EntityBuilder\ProductAttachmentHydrator::class)
				);
			}
		);
		/****************************
		 * REPOSITORIES
		 ****************************/
		$this->set(
			\AdventistCommons\Domain\Repository\ProductRepository::class,
			function () {
				return new \AdventistCommons\Domain\Repository\ProductRepository(
					$this->get(Product_model::class),
					$this->get(\AdventistCommons\Domain\EntityBuilder\ProductHydrator::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Repository\SeriesRepository::class,
			function () {
				return new \AdventistCommons\Domain\Repository\SeriesRepository(
					$this->get(Product_model::class),
					$this->get(\AdventistCommons\Domain\EntityBuilder\SeriesHydrator::class)
				);
			}
		);
		
		/****************************
		 * Builders
		 ****************************/
		$this->set(
			\AdventistCommons\Domain\EntityBuilder\ProductBuilder::class,
			function () {
				return new \AdventistCommons\Domain\EntityBuilder\ProductBuilder(
					$this->get(\AdventistCommons\Domain\EntityBuilder\ProductHydrator::class),
					$this->get(\AdventistCommons\Domain\Repository\ProductRepository::class)
				);
			}
		);
		

		$this->closed = true;
	}

	private function set( $name, $service ): void
	{
		if ($this->closed) {
			throw new \Exception('Cannot add services to container once it is closed');
		}

		if ($service instanceof Closure) {
			$this->containerClosures[$name] = $service;
		} elseif (is_object($service)) {
			$this->container[$name] = $service;
		}
	}

	public function get( $name )
	{
		if (!$this->closed) {
			$this->init();
		}

		if (!isset($this->container[$name])) {
			if (!isset($this->containerClosures[$name])) {
				throw new \Exception(sprintf('Service does not exists : %s', $name));
			}

			$this->container[$name] = $this->containerClosures[$name]();
		}

		return $this->container[$name];
	}
}
