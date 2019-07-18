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
			\AdventistCommons\Domain\Metadata\MetadataManager::class,
			function () {
				return new \AdventistCommons\Domain\Metadata\MetadataManager();
			}
		);

		/****************************
		 * HYDRATORS
		 ****************************/
		$this->set(
			\AdventistCommons\Domain\Hydrator\EntityCache::class,
			function () {
				return new \AdventistCommons\Domain\Hydrator\EntityCache();
			}
		);
		$this->set(
			\AdventistCommons\Domain\Hydrator\Preprocessor\FilePreprocessor::class,
			function () {
				return new \AdventistCommons\Domain\Hydrator\Preprocessor\FilePreprocessor(
					$this->get(\AdventistCommons\Domain\File\FileSystem::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Hydrator\Preprocessor\ForeignPreprocessor::class,
			function () {
				return new \AdventistCommons\Domain\Hydrator\Preprocessor\ForeignPreprocessor(
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Hydrator\Preprocessor\AggregatedPreprocessor::class,
			function () {
				return new \AdventistCommons\Domain\Hydrator\Preprocessor\AggregatedPreprocessor(
					[
						$this->get(\AdventistCommons\Domain\Hydrator\Preprocessor\ForeignPreprocessor::class),
						$this->get(\AdventistCommons\Domain\Hydrator\Preprocessor\FilePreprocessor::class)
					]
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Hydrator\Hydrator::class,
			function () {
				return new \AdventistCommons\Domain\Hydrator\Hydrator(
					$this->get(\AdventistCommons\Domain\Hydrator\Preprocessor\AggregatedPreprocessor::class),
					$this->get(\AdventistCommons\Domain\Metadata\MetadataManager::class),
					$this->get(\AdventistCommons\Domain\Hydrator\EntityCache::class)
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
					$this->get(\AdventistCommons\Domain\Hydrator\Hydrator::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Repository\SeriesRepository::class,
			function () {
				return new \AdventistCommons\Domain\Repository\SeriesRepository(
					$this->get(Product_model::class),
					$this->get(\AdventistCommons\Domain\Hydrator\Hydrator::class)
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
		 * Actions
		 ****************************/
		$this->set(
			\AdventistCommons\Domain\Action\SubmitEntity::class,
			function () {
				return new \AdventistCommons\Domain\Action\SubmitEntity(
					$this->get(\AdventistCommons\Domain\Hydrator\Hydrator::class),
					$this->get(\AdventistCommons\Domain\Repository\RepositoryLister::class),
					$this->get(\AdventistCommons\Domain\Metadata\MetadataManager::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Action\StoreEntity::class,
			function () {
				return new \AdventistCommons\Domain\Action\StoreEntity(
					$this->get(\AdventistCommons\Domain\Storage\Storer::class)
				);
			}
		);
		
		/****************************
		 * Storage
		 ****************************/
		$this->set(
			\AdventistCommons\Domain\Storage\Preprocessor\UploadPreprocessor::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Preprocessor\UploadPreprocessor(
					$this->get(\AdventistCommons\Domain\File\FileSystem::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Preprocessor\ImagePreprocessor::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Preprocessor\ImagePreprocessor(
					$this->get(\AdventistCommons\Domain\File\FileSystem::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Preprocessor\XliffPreprocessor::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Preprocessor\XliffPreprocessor(
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Preprocessor\AggregatedPreprocessor::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Preprocessor\AggregatedPreprocessor(
					[
						$this->get(\AdventistCommons\Domain\Storage\Preprocessor\UploadPreprocessor::class),
						$this->get(\AdventistCommons\Domain\Storage\Preprocessor\ImagePreprocessor::class),
						$this->get(\AdventistCommons\Domain\Storage\Preprocessor\XliffPreprocessor::class)
					]
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Storer::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Storer(
					$this->get(\AdventistCommons\Domain\Storage\Putter\Putter::class),
					$this->get(\AdventistCommons\Domain\Storage\Preprocessor\AggregatedPreprocessor::class),
					$this->get(\AdventistCommons\Domain\Metadata\MetadataManager::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Putter\Putter::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Putter\Putter([
					$this->get(Product_model::class),
				]);
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
