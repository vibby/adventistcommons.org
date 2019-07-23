<?php

namespace AdventistCommons\Domain\Entity;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
abstract class Entity
{
    protected $id;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
    
    abstract public static function __getMetadata(): array;
}
