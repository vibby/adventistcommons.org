<?php

namespace AdventistCommons\Domain\Hydrator;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\FieldMetadata;
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
            $setMethodName = $parentMetadata->get('multiple')
                ? $entityMetadata->propertyToAdder($parentMetadata->getFieldName())
                : $entityMetadata->propertyToSetter($parentMetadata->getFieldName());
            $parent->$setMethodName($entity);
        }
        $this->doneClass[$entityMetadata->get('fieldName')] = true;
        foreach ($entityMetadata->getFieldsForHydratorNormalizer(ForeignNormalizer::class) as $fieldName => $fieldMetadata) {
            $getMethodName = $entityMetadata->propertyToGetter($fieldName);
            $sub           = $entity->$getMethodName();
            $newSub        = null;
            if (! $sub) {
                continue;
            } elseif (is_array($sub)) {
                $newSub = $sub;
                array_map(
                    function ($child) use ($entity, $fieldMetadata) {
                        return $this->setParentDeep($child, $entity, $fieldMetadata);
                    },
                    $newSub
                );
            } elseif ($sub instanceof Entity) {
                $newSub = $this->setParentDeep($sub, $entity, $fieldMetadata);
            }
            if (! $newSub) {
                throw new \Exception('Foreign fields must have for value an Entity or an array of entites');
            }
            $setMethodName = $entityMetadata->propertyToSetter($fieldName);
            $entity->$setMethodName($sub);
        }

        return $entity;
    }
}
