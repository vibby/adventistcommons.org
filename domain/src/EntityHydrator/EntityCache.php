<?php

namespace AdventistCommons\Domain\EntityHydrator;

class EntityCache
{
	private $cache;
	
	public function get($className, $id)
	{
		return $this->cache[$className][$id] ?? null;
	}
	
	public function has($className, $id)
	{
		return isset($this->cache[$className][$id]);
	}
	
	public function set($className, $id, $object): void
	{
		$this->cache[$className][$id] = $object;
	}
}
