<?php

namespace AdventistCommons\Domain\Hydrator\Normalizer;

use AdventistCommons\Domain\Metadata\FieldMetadata;
use AdventistCommons\Domain\Metadata\EntityMetadata;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class CheckSameNormalizer implements NormalizerInterface, PreviousEntityAwareInterface
{
    use PreviousEntityAwareTrait;
    
    public function normalize(iterable $entityData, EntityMetadata $entityMetadata): iterable
    {
        /**
         * @var string $fieldName
         * @var FieldMetadata $fieldMetadata
         */
        foreach ($entityMetadata->getFieldsForHydratorNormalizer(self::class) as $fieldName => $fieldMetadata) {
            if (isset($entityData[$fieldName])) {
                $methodName = EntityMetadata::getter($fieldName);
                if ($entityData[$fieldName] !== $this->previousEntity->$methodName()) {
                    throw new Exception('Values are not the same !');
                }
            }
        }
        
        return $entityData;
    }
}
