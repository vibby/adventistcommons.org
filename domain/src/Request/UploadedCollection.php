<?php

namespace AdventistCommons\Domain\Request;

use AdventistCommons\Domain\File\Uploaded;
use AdventistCommons\Domain\File\UploadedBuilder;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class UploadedCollection implements \ArrayAccess, \Iterator
{
    private $files = [];
    
    public function __construct()
    {
        $this->position = 0;
    }
    
    public function offsetExists($offset)
    {
        return isset($this->files[$offset]);
    }
    
    public function offsetGet($offset)
    {
        return $this->files[$offset];
    }
    
    public function offsetSet($offset, $uploaded)
    {
        /** Uploaded $uploaded */
        if (!$uploaded instanceof Uploaded) {
            throw new \LogicException('Uploaded files list can only accept uploaded files.');
        }
        $this->files[$offset] = $uploaded;
    }
    
    public function offsetUnset($offset)
    {
        unset($this->files[$offset]);
    }
    
    public function rewind()
    {
        return reset($this->files);
    }
    
    public function current()
    {
        return current($this->files);
    }
    
    public function key()
    {
        return key($this->files);
    }
    
    public function next()
    {
        return next($this->files);
    }
    
    public function valid()
    {
        return key($this->files) !== null;
    }
    
    public static function buildFromRequestsFiles(array $files): self
    {
        $collection = new self;
        foreach ($files as $name => $fileInfo) {
            if ($file = UploadedBuilder::build($fileInfo)) {
                $collection[$name] = $file;
            }
        }
        
        return $collection;
    }
}
