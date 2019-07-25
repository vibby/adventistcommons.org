<?php

namespace AdventistCommons\Domain\Request;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
abstract class AbstractCollection implements \ArrayAccess, \Iterator
{
    use ToArrayTrait;
    
    protected $items = [];
    
    public function __construct()
    {
        $this->position = 0;
    }
    
    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }
    
    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }
    
    public function offsetSet($offset, $item)
    {
        $this->validate($item);
        $this->items[$offset] = $item;
    }
    
    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }
    
    public function rewind()
    {
        return reset($this->items);
    }
    
    public function current()
    {
        return current($this->items);
    }
    
    public function key()
    {
        return key($this->items);
    }
    
    public function next()
    {
        return next($this->items);
    }
    
    public function valid()
    {
        return key($this->items) !== null;
    }
        
    abstract protected function validate($item): void;
}
