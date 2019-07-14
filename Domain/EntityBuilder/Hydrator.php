<?php

namespace AdventistCommons\Domain\EntityBuilder;

use AdventistCommons\Domain\Entity\ValidationException;
use Kolyunya\StringProcessor\Format\CamelCaseFormatter;

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
			$method = 'set'.CamelCaseFormatter::run($key);
			if (method_exists($object, $method)) {
				$object->$method($value);
			}
		}

		return $object;
	}
}
