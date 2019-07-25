<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Metadata\MetadataManager;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class ForeignCreateProcessor extends AbstractFieldBasedProcessor implements ProcessorInterface
{
    /** @var PutterProcessor */
    private $putterProcessor;
    
    /** @var MetadataManager */
    private $metadataManager;
    
    public function __construct(PutterProcessor $putterProcessor, MetadataManager $metadataManager)
    {
        $this->putterProcessor = $putterProcessor;
        $this->metadataManager = $metadataManager;
    }
    
    protected function processOne(Entity $entity, $value, string $fieldName, EntityMetadata $metadata): Entity
    {
        if (! $value) {
            return $entity;
        }
        $setMethodName = $metadata->propertyToSetter($fieldName);
        $changed       = [];
        if (is_array($value)) {
            foreach ($value as $otherEntity) {
                if (! $otherEntity instanceof Entity) {
                    throw new \Exception('A foreign field value must be an entity or an array of entities');
                }
                $changed[] = $this->createForeign($otherEntity);
            }
        }
        if ($value instanceof Entity) {
            $changed = $this->createForeign($value);
        }
        
        if (! $changed) {
            throw new \Exception('A foreign field value must be an entity or an array of entities');
        }
        
        $entity->$setMethodName($changed);
        
        return $entity;
    }
    
    private function createForeign(Entity $foreign)
    {
        return $this->putterProcessor->process(
            $foreign,
            $this->metadataManager->getForClass(get_class($foreign)),
            $this->action
        );
    }
}
