<?php

namespace AdventistCommons\Domain\Storage\Remover;

use AdventistCommons\Domain\Entity;
use AdventistCommons\Domain\Metadata\MetadataManager;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
class Remover
{
    private $removers;
    private $metadataManager;
    
    public function __construct(array $removers, MetadataManager $metadataManager)
    {
        $this->metadataManager = $metadataManager;
        foreach ($removers as $remover) {
            if ($remover instanceof ProductRemoverInterface) {
                $this->removers[Entity\Product::class] = $remover;
            }
            if ($remover instanceof SeriesRemoverInterface) {
                $this->removers[Entity\Series::class] = $remover;
            }
            if ($remover instanceof SectionRemoverInterface) {
                $this->removers[Entity\Section::class] = $remover;
            }
            if ($remover instanceof ContentRemoverInterface) {
                $this->removers[Entity\Content::class] = $remover;
            }
        }
    }
    
    public function remove(Entity\Entity $entity): void
    {
        if (! isset($this->removers[get_class($entity)])) {
            throw new \Exception(sprintf('Remover is not set for class %s', get_class($entity)));
        }
        
        $remover    = $this->removers[get_class($entity)];
        $methodName = $this->metadataManager->getForClass(get_class($entity))->getRemoveMethodName();
        $remover->$methodName($entity->getId());
    }
}
