<?php

namespace AdventistCommons\Domain\Hydrator\Normalizer;

use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\File\FileSystem;
use AdventistCommons\Domain\Metadata\FieldMetadata;
use AdventistCommons\Domain\Metadata\EntityMetadata;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
class FileNormalizer implements NormalizerInterface
{
    private $fileSystem;
    
    public function __construct(FileSystem $fileSystem)
    {
        $this->fileSystem = $fileSystem;
    }
    
    public function normalize(iterable $entityData, EntityMetadata $entityMetadata): iterable
    {
        /**
         * @var string $fieldName
         * @var FieldMetadata $fieldMetadata
         */
        foreach ($entityMetadata->getFieldsForHydratorNormalizer(self::class) as $fieldName => $fieldMetadata) {
            if (isset($entityData[$fieldName])) {
                if ($entityData[$fieldName] && is_string($entityData[$fieldName])) {
                    $basePath               = $this->fileSystem->getRootPath($fieldMetadata->get('root_path_group'));
                    $entityData[$fieldName] = new File($basePath, $entityData[$fieldName]);
                } elseif (! $entityData[$fieldName] instanceof File) {
                    $entityData[$fieldName] = null;
                }
            }
        }
        
        return $entityData;
    }
}
