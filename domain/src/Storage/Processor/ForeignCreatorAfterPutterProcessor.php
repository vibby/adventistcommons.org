<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Storage\StorerAwareTrait;
use AdventistCommons\Domain\Storage\StorerAwareInterface;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
class ForeignCreatorAfterPutterProcessor extends AbstractFieldBasedProcessor implements ProcessorInterface, StorerAwareInterface
{
    use StorerAwareTrait;

    protected function processOne(Entity $entity, $value, string $fieldName): Entity
    {
        if (! $value) {
            return $entity;
        }
        $metadata      = $this->metadataManager->getForClass(get_class($entity));
        $setMethodName = $metadata->propertyToSetter($fieldName);
        $changed       = [];
        if (is_array($value)) {
            foreach ($value as $otherEntity) {
                if (! $otherEntity instanceof Entity) {
                    throw new \Exception('A foreign field value must be an entity or an array of entities');
                }
                $changed[] = $this->getStorer()->store($otherEntity);
            }
        }
        if ($value instanceof Entity) {
            $changed = $this->getStorer()->store($value);
        }
        
        if (! $changed) {
            throw new \Exception('A foreign field value must be an entity or an array of entities');
        }
        
        $entity->$setMethodName($changed);
        
        return $entity;
    }
    
    public function getPriority(): int
    {
        return 60;
    }
}
