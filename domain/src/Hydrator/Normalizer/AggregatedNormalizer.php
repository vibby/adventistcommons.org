<?php

namespace AdventistCommons\Domain\Hydrator\Normalizer;

use AdventistCommons\Domain\Metadata\EntityMetadata;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class AggregatedNormalizer implements NormalizerInterface, HydratorAwareInterface, PreviousEntityAwareInterface
{
    use  HydratorAwareTrait;
    use  PreviousEntityAwareTrait;
    
    private $normalizers;
    
    public function __construct(array $normalizers)
    {
        foreach ($normalizers as $normalizer) {
            if (! $normalizer instanceof NormalizerInterface) {
                throw new \Exception('Parameter of aggregrated normalizer must be an array of normalizers');
            }
        }
        $this->normalizers = $normalizers;
    }
    
    public function normalize(iterable $entityData, EntityMetadata $metaData): iterable
    {
        foreach ($this->normalizers as $normalizer) {
            if ($normalizer instanceof HydratorAwareInterface) {
                $normalizer->setHydrator($this->hydrator);
            }
            if ($normalizer instanceof PreviousEntityAwareInterface) {
                $normalizer->setPreviousEntity($this->previousEntity);
            }
            $entityData = $normalizer->normalize($entityData, $metaData);
        }
        
        return $entityData;
    }
}
