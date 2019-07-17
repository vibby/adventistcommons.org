<?php

namespace AdventistCommons\Domain\EntityBuilder;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\EntityHydrator\Hydrator;
use AdventistCommons\Domain\File\UploadedBuilder;
use AdventistCommons\Domain\File\UploadedCollection;
use AdventistCommons\Domain\Repository\RepositoryLister;
use AdventistCommons\Domain\EntityHydrator\ProductAbstractHydrator;
use AdventistCommons\Domain\EntityMetadata\MetadataManager;

class Builder
{
	private $hydrator;
	private $repositoryLister;
	private $metadataManager;
	
	public function __construct(Hydrator $hydrator, RepositoryLister $repositoryLister, MetadataManager $metadataManager)
	{
		$this->hydrator = $hydrator;
		$this->repositoryLister = $repositoryLister;
		$this->metadataManager = $metadataManager;
	}
	
	public function buildOrUpdateFromArray(string $className, array $entityData, UploadedCollection $uploadedFiles = null): Entity
	{
		$entity = null;
		$repository = $this->repositoryLister->getForClassName($className);
		if (isset($entityData['id']) && $entityData['id']) {
			$entity = $repository->find($entityData['id']);
		}
		$entity = $this->hydrator->hydrate(
			$entity ?? $className,
			$entityData,
			$uploadedFiles,
			false
		);
		$validator = $this->metadataManager->getForClass($className)->get('validator_class');
		$validator::validate($entity);
		
		return $entity;
	}
}
