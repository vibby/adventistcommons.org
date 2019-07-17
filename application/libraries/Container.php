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
					[
						'0'      => realpath(__DIR__.'/../../uploads'),
						'images' => realpath(__DIR__.'/../../uploads'),
						'xliff'  => realpath(__DIR__.'/../../uploads'),
					]
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\EntityMetadata\MetadataManager::class,
			function () {
				return new \AdventistCommons\Domain\EntityMetadata\MetadataManager();
			}
		);

		/****************************
		 * HYDRATORS
		 ****************************/
		$this->set(
			\AdventistCommons\Domain\EntityHydrator\EntityCache::class,
			function () {
				return new \AdventistCommons\Domain\EntityHydrator\EntityCache();
			}
		);
		$this->set(
			\AdventistCommons\Domain\EntityHydrator\FileHydrator::class,
			function () {
				return new \AdventistCommons\Domain\EntityHydrator\FileHydrator(
					$this->get(\AdventistCommons\Domain\File\FileSystem::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\EntityHydrator\ForeignHydrator::class,
			function () {
				return new \AdventistCommons\Domain\EntityHydrator\ForeignHydrator(
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\EntityHydrator\Hydrator::class,
			function () {
				return new \AdventistCommons\Domain\EntityHydrator\Hydrator(
					$this->get(\AdventistCommons\Domain\EntityHydrator\FileHydrator::class),
					$this->get(\AdventistCommons\Domain\EntityHydrator\ForeignHydrator::class),
					$this->get(\AdventistCommons\Domain\EntityMetadata\MetadataManager::class),
					$this->get(\AdventistCommons\Domain\EntityHydrator\EntityCache::class)
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
					$this->get(\AdventistCommons\Domain\EntityHydrator\Hydrator::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Repository\SeriesRepository::class,
			function () {
				return new \AdventistCommons\Domain\Repository\SeriesRepository(
					$this->get(Product_model::class),
					$this->get(\AdventistCommons\Domain\EntityHydrator\Hydrator::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Repository\RepositoryLister::class,
			function () {
				return new \AdventistCommons\Domain\Repository\RepositoryLister(
					$this->get(\AdventistCommons\Domain\Repository\ProductRepository::class),
					$this->get(\AdventistCommons\Domain\Repository\SeriesRepository::class)
				);
			}
		);
		
		/****************************
		 * Builders
		 ****************************/
		$this->set(
			\AdventistCommons\Domain\EntityBuilder\Builder::class,
			function () {
				return new \AdventistCommons\Domain\EntityBuilder\Builder(
					$this->get(\AdventistCommons\Domain\EntityHydrator\Hydrator::class),
					$this->get(\AdventistCommons\Domain\Repository\RepositoryLister::class),
					$this->get(\AdventistCommons\Domain\EntityMetadata\MetadataManager::class)
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
			throw new \Exception('Cannot add services to container since it was closed');
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
	
	public function has( $name )
	{
		if (!$this->closed) {
			$this->init();
		}
		
		return (isset($this->containerClosures[ $name ]) || isset($this->container[ $name ]));
	}
}
