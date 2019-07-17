<?php

namespace AdventistCommons\Domain\EntityHydrator;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\EntityMetadata\EntityMetadata;
use AdventistCommons\Domain\EntityMetadata\MetadataManager;
use AdventistCommons\Domain\File\UploadedCollection;
use Kolyunya\StringProcessor\Format\CamelCaseFormatter;

class Hydrator
{
	private $fileHydrator;
	private $foreignHydrator;
	private $metadataManager;
	private $entityCache;
	
	public function __construct(
		FileHydrator $fileHydrator,
		ForeignHydrator $foreignHydrator,
		MetadataManager $metadataManager,
		EntityCache $entityCache
	) {
		$this->fileHydrator = $fileHydrator;
		$this->foreignHydrator = $foreignHydrator;
		$this->metadataManager = $metadataManager;
		$this->entityCache = $entityCache;
	}
	
	public function hydrate($object, array $entityData, UploadedCollection $uploadedCollection = null, $useCache = true, $path = [])
	{
		$entity = self::getEntity($object);
		$className = get_class($entity);
		$metaData = $this->metadataManager->getForClass($className);
		
		if ($useCache && isset($entityData['id']) && $this->entityCache->has($className, $entityData['id'])) {
			return $this->entityCache->get($className, $entityData['id']);
		}
		
		$entityData = $this->fileHydrator->buildFiles($entityData, $metaData);
		$entityData = $this->foreignHydrator->buildForeign($entityData, $metaData, $this);
				
		$entity = self::hydrateProperties($entity, $entityData, $metaData);
		if ($uploadedCollection) {
			$entity = self::hydrateProperties($entity, $uploadedCollection, $metaData);
		}
		
		if (isset($entityData['id'])) {
			$this->entityCache->set($className, $entityData['id'], $entity);
		}
		
		return $entity;
	}
	
	private static function getEntity($object): Entity
	{
		if ($object instanceof Entity) {
			$entity = $object;
		} elseif (is_string($object) && is_subclass_of($object, Entity::class)) {
			$className = $object;
			try {
				$entity = new $className();
			} catch (\Exception $e) {
				throw new \Exception(sprintf('Entity %s must have a constructor without parameter', $className));
			}
		} else {
			throw new \Exception(sprintf(
				'Do not know what to hydrate. You must provide the object or its class name. %s given',
				$object
			));
		}
	
		return $entity;
	}
	
	private static function hydrateProperties(Entity $entity, Iterable $data, EntityMetadata $metadata)
	{
		foreach ($data as $key => $value) {
			if (in_array($key, $metadata->getForeingIdNames())) {
				continue;
			}
			$method = 'set'.CamelCaseFormatter::run($key);
			if (!method_exists($entity, $method)) {
				throw new \Exception(sprintf('Method %s does not exists on class %s', $method, get_class($entity)));
			}
			$entity->$method($value);
		}
		
		return $entity;
	}
}
