<?php

namespace AdventistCommons\Domain\Metadata;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
class ActionMetadata
{
    private $class;
    private $metadata;
    
    public function __construct($structure)
    {
        $this->class              = $structure['class'];
        $this->metadata['fields'] = $structure['fields'];
    }
    
    public function getClass()
    {
        return $this->class;
    }
    
    public function get($key)
    {
        return $this->metadata[$key] ?? null;
    }
    
    public static function buildFromArray(array $structure)
    {
        return new self($structure);
    }
}
