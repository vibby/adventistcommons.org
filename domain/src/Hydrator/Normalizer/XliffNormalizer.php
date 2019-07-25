<?php

namespace AdventistCommons\Domain\Hydrator\Normalizer;

use AdventistCommons\Domain\File\Uploaded;
use AdventistCommons\Domain\Xliff\XliffParser;
use AdventistCommons\Domain\Metadata\FieldMetadata;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Hydrator\HydratorAwareTrait;
use AdventistCommons\Domain\Hydrator\HydratorAwareInterface;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class XliffNormalizer implements NormalizerInterface, HydratorAwareInterface
{
    use HydratorAwareTrait;
    
    private $xliffParser;
    
    public function __construct(XliffParser $xliffParser)
    {
        $this->xliffParser = $xliffParser;
    }
    
    public function normalize(iterable $entityData, EntityMetadata $entityMetadata): iterable
    {
        /**
         * @var string $fieldName
         * @var FieldMetadata $fieldMetadata
         */
        foreach (array_keys($entityMetadata->getFieldsForHydratorNormalizer(self::class)) as $fieldName) {
            if (isset($entityData[$fieldName]) && ($entityData[$fieldName] instanceof Uploaded)) {
                $this->xliffParser->setHydrator($this->getHydrator());
                $entityData['section'] = $this->xliffParser->parseFile($entityData[$fieldName]);
            }
        }
        
        return $entityData;
    }
}
