<?php

namespace AdventistCommons\Domain\Hydrator;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Metadata\MetadataManager;
use AdventistCommons\Domain\Request\UploadedCollection;
use AdventistCommons\Domain\Hydrator\Normalizer\NormalizerInterface;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
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
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function hydrate(
        $object, // class name or entity itself
        iterable $entityData,
        UploadedCollection $uploadedCollection = null,
        $useCache = true
    ) {
        $entity    = self::getEntity($object);
        $className = get_class($entity);
        $metaData  = $this->metadataManager->getForClass($className);
        
        if ($useCache && isset($entityData['id']) && $this->entityCache->has($className, $entityData['id'])) {
            return $this->entityCache->get($className, $entityData['id']);
        }
        
        if ($this->normalizer instanceof HydratorAwareInterface) {
            $this->normalizer->setHydrator($this);
        }
        $entityData = array_merge(
            is_array($entityData) ? $entityData : $entityData->toArray(),
            $uploadedCollection ? $uploadedCollection->toArray() : []
        );
        $entityData = $this->normalizer->normalize($entityData, $metaData, $entity);
        
        $entity = self::hydrateProperties($entity, $entityData, $metaData);
        
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
    
    private static function hydrateProperties(Entity $entity, Iterable $data, EntityMetadata $metadata)
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
