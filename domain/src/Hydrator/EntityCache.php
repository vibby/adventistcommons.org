<?php

namespace AdventistCommons\Domain\Hydrator;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
class EntityCache
{
    private $cache;
    
    public function get($className, $entityId)
    {
        return $this->cache[$className][$entityId] ?? null;
    }
    
    public function has($className, $entityId)
    {
        return isset($this->cache[$className][$entityId]);
    }
    
    public function set($className, $entityId, $object): void
    {
        $this->cache[$className][$entityId] = $object;
    }
}
