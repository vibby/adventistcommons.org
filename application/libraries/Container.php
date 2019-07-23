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
						'attachment'  => realpath(__DIR__.'/../../uploads'),
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
		$this->set(
			\AdventistCommons\Domain\Xliff\XliffParser::class,
			function () {
				return new \AdventistCommons\Domain\Xliff\XliffParser();
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
			\AdventistCommons\Domain\Hydrator\Normalizer\FileNormalizer::class,
			function () {
				return new \AdventistCommons\Domain\Hydrator\Normalizer\FileNormalizer(
					$this->get(\AdventistCommons\Domain\File\FileSystem::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Hydrator\Normalizer\ForeignNormalizer::class,
			function () {
				return new \AdventistCommons\Domain\Hydrator\Normalizer\ForeignNormalizer(
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Hydrator\Normalizer\ForeignFromIdNormalizer::class,
			function () {
				return new \AdventistCommons\Domain\Hydrator\Normalizer\ForeignFromIdNormalizer(
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Hydrator\Normalizer\XliffNormalizer::class,
			function () {
				return new \AdventistCommons\Domain\Hydrator\Normalizer\XliffNormalizer(
					$this->get(\AdventistCommons\Domain\Xliff\XliffParser::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Hydrator\Normalizer\AggregatedNormalizer::class,
			function () {
				return new \AdventistCommons\Domain\Hydrator\Normalizer\AggregatedNormalizer(
					[
						$this->get(\AdventistCommons\Domain\Hydrator\Normalizer\ForeignNormalizer::class),
						$this->get(\AdventistCommons\Domain\Hydrator\Normalizer\ForeignFromIdNormalizer::class),
						$this->get(\AdventistCommons\Domain\Hydrator\Normalizer\FileNormalizer::class),
						$this->get(\AdventistCommons\Domain\Hydrator\Normalizer\XliffNormalizer::class),
					]
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Hydrator\Hydrator::class,
			function () {
				return new \AdventistCommons\Domain\Hydrator\Hydrator(
					$this->get(\AdventistCommons\Domain\Hydrator\Normalizer\AggregatedNormalizer::class),
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
			\AdventistCommons\Domain\Repository\ProductAttachmentRepository::class,
			function () {
				return new \AdventistCommons\Domain\Repository\ProductAttachmentRepository(
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
				return new \AdventistCommons\Domain\Repository\RepositoryLister([
					$this->get(\AdventistCommons\Domain\Repository\ProductRepository::class),
					$this->get(\AdventistCommons\Domain\Repository\ProductAttachmentRepository::class),
					$this->get(\AdventistCommons\Domain\Repository\SeriesRepository::class)
				]);
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
		$this->set(
			\AdventistCommons\Domain\Action\RemoveEntity::class,
			function () {
				return new \AdventistCommons\Domain\Action\RemoveEntity(
					$this->get(\AdventistCommons\Domain\Storage\Storer::class)
				);
			}
		);
		
		/****************************
		 * Storage
		 ****************************/
		$this->set(
			\AdventistCommons\Domain\Storage\Processor\UploadProcessor::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Processor\UploadProcessor(
					$this->get(\AdventistCommons\Domain\File\FileSystem::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Processor\ImageProcessor::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Processor\ImageProcessor(
					$this->get(\AdventistCommons\Domain\File\FileSystem::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Processor\FileRemoveProcessor::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Processor\FileRemoveProcessor(
					$this->get(\AdventistCommons\Domain\File\FileSystem::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Processor\ForeignCreateProcessor::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Processor\ForeignCreateProcessor(
					$this->get(\AdventistCommons\Domain\Storage\Processor\PutterProcessor::class),
					$this->get(\AdventistCommons\Domain\Metadata\MetadataManager::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Processor\PutterProcessor::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Processor\PutterProcessor(
					$this->get(\AdventistCommons\Domain\Storage\Putter\Putter::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Processor\RemoverProcessor::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Processor\RemoverProcessor(
					$this->get(\AdventistCommons\Domain\Storage\Remover\Remover::class)
				);
			}
		);
		$this->set(
			'storeProcessor',
			function () {
				return new \AdventistCommons\Domain\Storage\Processor\AggregatedProcessor(
					[
						$this->get(\AdventistCommons\Domain\Storage\Processor\UploadProcessor::class),
						$this->get(\AdventistCommons\Domain\Storage\Processor\ImageProcessor::class),
						$this->get(\AdventistCommons\Domain\Storage\Processor\ForeignCreateProcessor::class),
						$this->get(\AdventistCommons\Domain\Storage\Processor\PutterProcessor::class),
					]
				);
			}
		);
		$this->set(
			'removeProcessor',
			function () {
				return new \AdventistCommons\Domain\Storage\Processor\AggregatedProcessor(
					[
						$this->get(\AdventistCommons\Domain\Storage\Processor\FileRemoveProcessor::class),
						$this->get(\AdventistCommons\Domain\Storage\Processor\RemoverProcessor::class),
					]
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Storer::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Storer(
					$this->get('storeProcessor'),
					$this->get('removeProcessor'),
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
		$this->set(
			\AdventistCommons\Domain\Storage\Remover\Remover::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Remover\Remover([
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
