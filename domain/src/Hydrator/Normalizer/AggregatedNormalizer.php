<?php

namespace AdventistCommons\Domain\Hydrator\Normalizer;

use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Hydrator\HydratorAwareTrait;
use AdventistCommons\Domain\Hydrator\HydratorAwareInterface;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class AggregatedNormalizer implements NormalizerInterface, HydratorAwareInterface
{
    use HydratorAwareTrait;
    
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
                $normalizer->setHydrator($this->getHydrator());
            }
            $entityData = $normalizer->normalize($entityData, $metaData);
        }
        
        return $entityData;
    }
}
