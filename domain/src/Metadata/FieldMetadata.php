<?php

namespace AdventistCommons\Domain\Metadata;

use AdventistCommons\Domain\Storage\Processor;
use AdventistCommons\Domain\Storage\Putter\Serializer;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class FieldMetadata
{
    const DEFAULTS = [
        'hydrate_normalizer'  => null,
        'store_processor'     => Processor\PutterProcessor::class,
        'putter_serializer'   => Serializer\DefaultSerializer::class,
        'multiple'            => false,
    ];
    
    private $metadata;
    private $fieldName;
    private $entityMetadata;
    
    public function __construct(string $fieldName, array $metadata, EntityMetadata $entityMetadata)
    {
        $this->fieldName      = $fieldName;
        $this->metadata       = array_merge(self::DEFAULTS, $metadata);
        $this->entityMetadata = $entityMetadata;
    }
    
    public function get($dataName)
    {
        return $this->metadata[$dataName];
    }
    
    public function has($dataName)
    {
        return isset($this->metadata[$dataName]);
    }
    
    public function getFieldName()
    {
        return $this->fieldName;
    }
    
    public function getEntityMetadata()
    {
        return $this->entityMetadata;
    }
    
    public function formatToId()
    {
        return sprintf('%s_id', $this->fieldName);
    }
}
