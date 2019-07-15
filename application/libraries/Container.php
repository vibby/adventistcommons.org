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

		/****************************
		 * CODE IGNITER MODELS
		 ****************************/
		$CI->load->model('ion_auth_model');
		$CI->load->model('product_model');
		$CIclasses = [
			Product_model::class  => $CI->product_model,
			Ion_auth_model::class => $CI->ion_auth_model,
		];

		foreach ($CIclasses as $className => $object) {
			$this->set($className, $object);
		}
		
		/****************************
		 * BASE SERVICES
		 ****************************/
		$this->set(
			\AdventistCommons\Domain\File\FileSystem::class,
			function () {
				return new \AdventistCommons\Domain\File\FileSystem(
					realpath(__DIR__.'/../../uploads')
				);
			}
		);

		/****************************
		 * HYDRATORS
		 ****************************/
		$this->set(
			\AdventistCommons\Domain\EntityHydrator\LanguageHydrator::class,
			function () {
				return new \AdventistCommons\Domain\EntityHydrator\LanguageHydrator();
			}
		);
		$this->set(
			\AdventistCommons\Domain\EntityHydrator\SeriesHydrator::class,
			function () {
				return new \AdventistCommons\Domain\EntityHydrator\SeriesHydrator();
			}
		);
		$this->set(
			\AdventistCommons\Domain\EntityHydrator\ProjectHydrator::class,
			function () {
				return new \AdventistCommons\Domain\EntityHydrator\ProjectHydrator(
					$this->get(\AdventistCommons\Domain\EntityHydrator\LanguageHydrator::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\EntityHydrator\ProductAttachmentHydrator::class,
			function () {
				return new \AdventistCommons\Domain\EntityHydrator\ProductAttachmentHydrator(
					$this->get(\AdventistCommons\Domain\EntityHydrator\LanguageHydrator::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\EntityHydrator\ProductHydrator::class,
			function () {
				return new \AdventistCommons\Domain\EntityHydrator\ProductHydrator(
					$this->get(\AdventistCommons\Domain\EntityHydrator\ProjectHydrator::class),
					$this->get(\AdventistCommons\Domain\EntityHydrator\ProductAttachmentHydrator::class)
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
					$this->get(\AdventistCommons\Domain\EntityHydrator\ProductHydrator::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Repository\SeriesRepository::class,
			function () {
				return new \AdventistCommons\Domain\Repository\SeriesRepository(
					$this->get(Product_model::class),
					$this->get(\AdventistCommons\Domain\EntityHydrator\SeriesHydrator::class)
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
					$this->get(\AdventistCommons\Domain\EntityHydrator\ProductHydrator::class),
					$this->get(\AdventistCommons\Domain\Repository\ProductRepository::class)
				);
			}
		);
		
		/****************************
		 * Storage
		 ****************************/
		$this->set(
			\AdventistCommons\Domain\Storage\FileStorer::class,
			function () {
				return new \AdventistCommons\Domain\Storage\FileStorer(
					$this->get(\AdventistCommons\Domain\File\FileSystem::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\ProductStorer::class,
			function () {
				return new \AdventistCommons\Domain\Storage\ProductStorer(
					$this->get(Product_model::class),
					$this->get(\AdventistCommons\Domain\Storage\FileStorer::class)
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
