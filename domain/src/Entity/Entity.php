<?php

namespace AdventistCommons\Domain\Entity;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
abstract class Entity
{
    protected $entityId;

    public function getId(): ?string
    {
        return $this->entityId;
    }

    public function setId(int $entityId): self
    {
        $this->entityId = $entityId;

        return $this;
    }
    
    abstract public static function getEntityMetadata(): array;
}
