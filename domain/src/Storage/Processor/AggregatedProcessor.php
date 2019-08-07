<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Storage\StorerAwareTrait;
use AdventistCommons\Domain\Storage\StorerAwareInterface;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
class AggregatedProcessor implements ProcessorInterface, StorerAwareInterface
{
    use StorerAwareTrait;
    
    private $processors;
    
    public function __construct(array $processors)
    {
        usort(
            $processors,
            function (ProcessorInterface $processor1, ProcessorInterface $processor2) {
                return $processor1->getPriority() > $processor2->getPriority();
            }
        );
                
        $this->processors = $processors;
    }
    
    public function process(Entity $entity, string $action): Entity
    {
        foreach ($this->processors as $processor) {
            if ($processor instanceof StorerAwareInterface) {
                $processor->setStorer($this->getStorer());
            }
            $entity = $processor->process($entity, $action);
        }
        
        return $entity;
    }
    
    public function getPriority(): int
    {
        return 5;
    }
}
