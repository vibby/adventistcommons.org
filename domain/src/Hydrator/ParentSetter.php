<?php

namespace AdventistCommons\Domain\Hydrator;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\FieldMetadata;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Metadata\MetadataManager;
use AdventistCommons\Domain\Hydrator\Normalizer\ForeignNormalizer;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class ParentSetter
{
    private $metadataManager;
    private $doneClass;
    
    public function __construct(
        MetadataManager $metadataManager
    ) {
        $this->metadataManager = $metadataManager;
    }
    
    public function setParentDeep(Entity $entity, Entity $parent = null, FieldMetadata $parentMetadata = null):  Entity
    {
        $entityMetadata = $this->metadataManager->getForClass(get_class($entity));
        if (isset($this->doneClass[$entityMetadata->get('fieldName')])) {
            return $entity;
        }
        if ($parent) {
            if ($parentMetadata->get('multiple')) {
                $setMethodName = EntityMetadata::propertyToAdder($parentMetadata->getFieldName());
            } else {
                $setMethodName = EntityMetadata::propertyToSetter($parentMetadata->getFieldName());
            }
            $parent->$setMethodName($entity);
        }
        $this->doneClass[$entityMetadata->get('fieldName')] = true;
        foreach ($entityMetadata->getFieldsForHydratorNormalizer(ForeignNormalizer::class) as $fieldName => $fieldMetadata) {
            $getMethodName = EntityMetadata::propertyToGetter($fieldName);
            $sub           = $entity->$getMethodName();
            if (! $sub) {
                continue;
            } elseif (is_array($sub)) {
                foreach ($sub as &$child) {
                    $child = $this->setParentDeep($child, $entity, $fieldMetadata);
                }
            } elseif ($sub instanceof Entity) {
                $sub = $this->setParentDeep($sub, $entity, $fieldMetadata);
            } else {
                throw new \Exception('Foreign fields must have for value an Entity or an array of entites');
            }
            $setMethodName = EntityMetadata::propertyToSetter($fieldName);
            $entity->$setMethodName($sub);
        }

        return $entity;
    }
}
