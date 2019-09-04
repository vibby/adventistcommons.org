<?php

namespace AdventistCommons\Domain\Hydrator;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\ActionMetadata;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Metadata\MetadataManager;
use AdventistCommons\Domain\Request\ToArrayInterface;
use AdventistCommons\Domain\Request\UploadedCollection;
use AdventistCommons\Domain\Hydrator\Normalizer\NormalizerInterface;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
class Hydrator
{
    private $normalizer;
    private $metadataManager;
    private $entityCache;
    
    public function __construct(
        NormalizerInterface $normalizer,
        MetadataManager $metadataManager,
        EntityCache $entityCache
    ) {
        $this->normalizer      = $normalizer;
        $this->metadataManager = $metadataManager;
        $this->entityCache     = $entityCache;
    }
    
    /**
     * @param string|Entity $object class name or entity itself
     * @param iterable $entityData
     * @param UploadedCollection|null $uploadedCollection
     * @param ActionMetadata $actionMetadata
     * @return Entity|null
     * @throws \Exception
     */
    public function hydrate(
        $object,
        iterable $entityData,
        UploadedCollection $uploadedCollection = null,
        ActionMetadata $actionMetadata = null
    ): ?Entity {
        $entity    = self::getEntity($object);
        $className = get_class($entity);
        $metaData  = $this->metadataManager->getForClass($className);
        if ($actionMetadata) {
            $metaData->mergeWithActionMetadata($actionMetadata);
        }
        
        if ($this->normalizer instanceof HydratorAwareInterface) {
            $this->normalizer->setHydrator($this);
        }
        $array1 = $entityData instanceof ToArrayInterface ? $entityData->toArray() : $entityData;
        if (! is_array($array1)) {
            throw new \Exception('Argument 1 must be an array or must implement the ToArray interface');
        }
        $array2     = $uploadedCollection ? $uploadedCollection->toArray() : [];
        $entityData = $this->normalizer->normalize(array_merge($array1, $array2), $metaData);
        
        $entity = self::hydrateProperties($entity, $entityData, $metaData);

        return $entity;
    }
    
    /**
     * @param $object
     * @param iterable $entityData
     * @param UploadedCollection|null $uploadedCollection
     * @param ActionMetadata|null $actionMetadata
     * @return Entity|null
     */
    public function hydrateCached(
        $object, // class name or entity itself
        iterable $entityData,
        UploadedCollection $uploadedCollection = null,
        ActionMetadata $actionMetadata = null
    ): ?Entity {
        $entity    = self::getEntity($object);
        $className = get_class($entity);
        if (isset($entityData['id']) && $this->entityCache->has($className, $entityData['id'])) {
            return $this->entityCache->get($className, $entityData['id']);
        }
    
        $entity = $this->hydrate($entity, $entityData, $uploadedCollection, $actionMetadata);
    
        if (isset($entityData['id'])) {
            $this->entityCache->set($className, $entityData['id'], $entity);
        }
    
        return $entity;
    }
    
    private static function getEntity($object): Entity
    {
        $entity = null;
        if ($object instanceof Entity) {
            $entity = $object;
        } elseif (is_string($object) && is_subclass_of($object, Entity::class)) {
            $className = $object;
            try {
                $entity = new $className();
            } catch (\ArgumentCountError $e) {
                throw new \Exception(sprintf(
                    'Entity %s must have a constructor without parameter',
                    $className
                ));
            }
        }
        
        if (! $entity) {
            throw new \Exception(sprintf(
                'Do not know what to hydrate. You must provide the object or its class name. %s given',
                $object
            ));
        }
    
        return $entity;
    }
    
    private static function hydrateProperties(Entity $entity, Iterable $data, EntityMetadata $metadata): Entity
    {
        foreach ($data as $key => $value) {
            if (in_array($key, $metadata->getForeignIdNames())) {
                continue;
            }
            $method = $metadata->propertyToSetter($key);
            if (! method_exists($entity, $method)) {
                throw new \Exception(sprintf(
                    'Method %s does not exists on class %s',
                    $method,
                    get_class($entity)
                ));
            }
            $entity->$method($value);
        }
        
        return $entity;
    }
}
