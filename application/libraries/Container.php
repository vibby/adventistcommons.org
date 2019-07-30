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
		$CI->load->model('project_model');
		$CIclasses = [
			Product_model::class  => $CI->product_model,
			Ion_auth_model::class => $CI->ion_auth_model,
			Project_model::class => $CI->project_model,
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
			\AdventistCommons\Domain\Hydrator\Xliff\XliffParser::class,
			function () {
				return new \AdventistCommons\Domain\Hydrator\Xliff\XliffParser();
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
			\AdventistCommons\Domain\Hydrator\Normalizer\XliffNormalizer::class,
			function () {
				return new \AdventistCommons\Domain\Hydrator\Normalizer\XliffNormalizer(
					$this->get(\AdventistCommons\Domain\Hydrator\Xliff\XliffParser::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Hydrator\Normalizer\AggregatedNormalizer::class,
			function () {
				return new \AdventistCommons\Domain\Hydrator\Normalizer\AggregatedNormalizer(
					[
						$this->get(\AdventistCommons\Domain\Hydrator\Normalizer\ForeignNormalizer::class),
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
					$this->get(\AdventistCommons\Domain\Metadata\MetadataManager::class),
					$this->get(\AdventistCommons\Domain\Validation\ValidatorCollection::class)
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
		 * Validation
		 ****************************/
		$this->set(
			\AdventistCommons\Domain\Validation\Validator\FileImageValidator::class,
			function () {
				return new \AdventistCommons\Domain\Validation\Validator\FileImageValidator(
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Validation\Validator\InArrayValidator::class,
			function () {
				return new \AdventistCommons\Domain\Validation\Validator\InArrayValidator(
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Validation\Validator\InstanceOfValidator::class,
			function () {
				return new \AdventistCommons\Domain\Validation\Validator\InstanceOfValidator(
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Validation\Validator\NotEmptyValidator::class,
			function () {
				return new \AdventistCommons\Domain\Validation\Validator\NotEmptyValidator(
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Validation\Validator\UploadedFileValidator::class,
			function () {
				return new \AdventistCommons\Domain\Validation\Validator\UploadedFileValidator(
				);
			}
		);

		/****************************
		 * Entity Validation
		 ****************************/
		$this->set(
			\AdventistCommons\Domain\Validation\Entity\ProductValidator::class,
			function () {
				return new \AdventistCommons\Domain\Validation\Entity\ProductValidator(
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Validation\Entity\ProductAttachmentValidator::class,
			function () {
				return new \AdventistCommons\Domain\Validation\Entity\ProductAttachmentValidator(
				);
			}
		);

		$this->set(
			\AdventistCommons\Domain\Validation\ValidatorCollection::class,
			function () {
				return new \AdventistCommons\Domain\Validation\ValidatorCollection([
					$this->get(\AdventistCommons\Domain\Validation\Validator\FileImageValidator::class),					
					$this->get(\AdventistCommons\Domain\Validation\Validator\InArrayValidator::class),					
					$this->get(\AdventistCommons\Domain\Validation\Validator\InstanceOfValidator::class),					
					$this->get(\AdventistCommons\Domain\Validation\Validator\NotEmptyValidator::class),					
					$this->get(\AdventistCommons\Domain\Validation\Validator\UploadedFileValidator::class),					
					$this->get(\AdventistCommons\Domain\Validation\Entity\ProductValidator::class),
					$this->get(\AdventistCommons\Domain\Validation\Entity\ProductAttachmentValidator::class),
				]);
			}
		);
		
		/****************************
		 * Storage
		 ****************************/
		$this->set(
			\AdventistCommons\Domain\Storage\Processor\UploadProcessor::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Processor\UploadProcessor(
					$this->get(\AdventistCommons\Domain\Metadata\MetadataManager::class),
					$this->get(\AdventistCommons\Domain\File\FileSystem::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Processor\ImageProcessor::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Processor\ImageProcessor(
					$this->get(\AdventistCommons\Domain\Metadata\MetadataManager::class),
					$this->get(\AdventistCommons\Domain\File\FileSystem::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Processor\FileRemoveProcessor::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Processor\FileRemoveProcessor(
					$this->get(\AdventistCommons\Domain\Metadata\MetadataManager::class),
					$this->get(\AdventistCommons\Domain\File\FileSystem::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Processor\ForeignCreatorAfterPutterProcessor::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Processor\ForeignCreatorAfterPutterProcessor(
					$this->get(\AdventistCommons\Domain\Metadata\MetadataManager::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Processor\ForeignCreatorBeforePutterProcessor::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Processor\ForeignCreatorBeforePutterProcessor(
					$this->get(\AdventistCommons\Domain\Metadata\MetadataManager::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Processor\PutterProcessor::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Processor\PutterProcessor(
					$this->get(\AdventistCommons\Domain\Metadata\MetadataManager::class),
					$this->get(\AdventistCommons\Domain\Storage\Putter\Serializer\EntitySerializer::class),
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
			\AdventistCommons\Domain\Storage\Processor\AggregatedProcessor::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Processor\AggregatedProcessor(
					[
						$this->get(\AdventistCommons\Domain\Storage\Processor\UploadProcessor::class),
						$this->get(\AdventistCommons\Domain\Storage\Processor\ImageProcessor::class),
						$this->get(\AdventistCommons\Domain\Storage\Processor\ForeignCreatorBeforePutterProcessor::class),
						$this->get(\AdventistCommons\Domain\Storage\Processor\PutterProcessor::class),
						$this->get(\AdventistCommons\Domain\Storage\Processor\ForeignCreatorAfterPutterProcessor::class),
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
					$this->get(\AdventistCommons\Domain\Storage\Processor\AggregatedProcessor::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Putter\Serializer\EntitySerializer::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Putter\Serializer\EntitySerializer(
					$this->get(\AdventistCommons\Domain\Metadata\MetadataManager::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Putter\Putter::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Putter\Putter(
					[
						$this->get(Product_model::class),
						$this->get(Project_model::class),
					],
					$this->get(\AdventistCommons\Domain\Metadata\MetadataManager::class)
				);
			}
		);
		$this->set(
			\AdventistCommons\Domain\Storage\Remover\Remover::class,
			function () {
				return new \AdventistCommons\Domain\Storage\Remover\Remover(
					[
						$this->get(Product_model::class),
					],
					$this->get(\AdventistCommons\Domain\Metadata\MetadataManager::class)
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
