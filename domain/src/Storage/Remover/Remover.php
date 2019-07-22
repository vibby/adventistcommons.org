<?php

namespace AdventistCommons\Domain\Storage\Remover;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\Entity\Series;
use AdventistCommons\Domain\Metadata\EntityMetadata;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class Remover
{
	private  $removers;
	
	public function __construct(array $removers)
	{
		foreach ($removers as $remover) {
			if ($remover instanceof ProductRemoverInterface) {
				$this->removers[Product::class] = $remover;
			}
			if ($remover instanceof SeriesRemoverInterface) {
				$this->removers[Series::class] = $remover;
			}
		}
	}
	
	public function remove(Entity $entity): void
	{
		if (!isset($this->removers[get_class($entity)])) {
			throw new \Exception(sprintf('Remover is not set for class %s', get_class($entity)));
		}
		
		$remover = $this->removers[get_class($entity)];
		$methodName = sprintf('remove%s', EntityMetadata::extractShortClassName($entity));

		$remover->$methodName($entity->getId());
	}
}
