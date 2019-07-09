<?php

namespace AdventistCommons\Domain\EntityBuilder;

use AdventistCommons\Domain\Entity\ValidationException;

abstract class Hydrator
{
	private $cache;

	protected function getCache($key)
	{
		return $this->cache[$key] ?? null;
	}

	protected function setCache($key, $object): void
	{
		$this->cache[$key] = $object;
	}

	static public function hydrateProperties($object, $data)
	{
		$data = array_filter($data);
		foreach ($data as $key => $value) {
			$method = 'set'.self::propertyNameToCamel($key);
			if (method_exists($object, $method)) {
				try {
					$object->$method($value);
				} catch (ValidationException $e) {
					// silent error to force incoming data from database, even if unvalid
				}
			}
		}

		return $object;
	}

	static function propertyNameToCamel($propertyName)
	{
		return str_replace(' ', '', ucwords(str_replace('_', ' ', $propertyName)));
	}
}
