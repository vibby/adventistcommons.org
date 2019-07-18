<?php

namespace AdventistCommons\Domain\Storage;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Entity\Product;
use Kolyunya\StringProcessor\Format\SnakeCaseFormatter;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class ArrayFormater
{
	static public function formatToArray(Entity $entity): array
	{
		$reflection = new \ReflectionClass(get_class($entity));
		$rightNamespace = join(
			array_slice(
				explode("\\", Product::class),
				0,
				-1
			),
			"\\"
		);

		if ($reflection->getNamespaceName() != $rightNamespace) {
			throw new \LogicException(sprintf(
				'Cannot store object that are not in the namespace %s. %s given',
				$rightNamespace,
				$reflection->getNamespaceName()
			));
		}

		$productData = [];
		foreach ($reflection->getMethods(\ReflectionMethod::IS_PUBLIC) as $reflectionMethod) {
			$methodName = $reflectionMethod->name;
			if (substr($methodName, 0, 3) === 'get') {
				$propertyName = substr($methodName, 3);
				$propertyName = SnakeCaseFormatter::run($propertyName);
				$value = $entity->$methodName();
				$productData[$propertyName] = is_array($value) ? serialize($value) : (string) $value;
			}
		}

		return $productData;
	}
}
