<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Metadata\FieldMetadata;
use AdventistCommons\Domain\Storage\Remover\Remover;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class RemoverProcessor implements ProcessorInterface
{
	private $remover;
	
	public function __construct(Remover $remover)
	{
		$this->remover = $remover;
	}
	
	public function process(Entity $entity, EntityMetadata $entityMetadata, string $action): Entity
	{
		$this->remover->remove($entity);
		
		return $entity;
	}
}
