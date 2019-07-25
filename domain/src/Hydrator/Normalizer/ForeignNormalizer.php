<?php

namespace AdventistCommons\Domain\Hydrator\Normalizer;

use AdventistCommons\Domain\Hydrator\Hydrator;
use AdventistCommons\Domain\Metadata\FieldMetadata;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Hydrator\HydratorAwareTrait;
use AdventistCommons\Domain\Hydrator\HydratorAwareInterface;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class ForeignNormalizer implements NormalizerInterface, HydratorAwareInterface
{
    use HydratorAwareTrait;
    
    public function normalize(iterable $entityData, EntityMetadata $entityMetadata): iterable
    {
        /**
         * @var string $fieldName
         * @var FieldMetadata $fieldMetadata
         */
        foreach ($entityMetadata->getFieldsForHydratorNormalizer(self::class) as $fieldName => $fieldMetadata) {
            if (isset($entityData[$fieldName])) {
                /** @var Hydrator $hydrator */
                $hydrator               = $this->getHydrator();
                $entityData[$fieldName] = $fieldMetadata->get('multiple')
                    ? array_map(
                        function ($data) use ($fieldMetadata, $hydrator) {
                            return $hydrator->hydrate(
                                $fieldMetadata->get('class'),
                                $data
                            );
                        },
                        $entityData[$fieldName]
                    )
                    : $hydrator->hydrate(
                        $fieldMetadata->get('class'),
                        $entityData[$fieldName][0]
                    );
            }
        }
        
        return $entityData;
    }
}
