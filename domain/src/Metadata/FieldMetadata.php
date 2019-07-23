<?php

namespace AdventistCommons\Domain\Metadata;

use AdventistCommons\Domain\Storage\Processor;
use AdventistCommons\Domain\Storage\Putter\Formatter;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class FieldMetadata
{
    const DEFAULTS = [
        'hydrate_normalizer' => null,
        'store_processor' => Processor\PutterProcessor::class,
        'persist_formatter' => Formatter\DefaultFormatter::class,
    ];
    
    private $metadata;
    private $fieldName;
    
    public function __construct(string $fieldName, array $metadata)
    {
        $this->fieldName = $fieldName;
        $this->metadata = array_merge(self::DEFAULTS, $metadata);
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
    
    public function formatToId()
    {
        return sprintf('%s_id', $this->fieldName);
    }
}
