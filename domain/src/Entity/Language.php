<?php

namespace AdventistCommons\Domain\Entity;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class Language extends Entity
{
    private $name;
    private $code;
    private $googleCode;
    private $productAttachment;
    private $project;
    
    public static function __getMetaData(): array
    {
        return [];
    }
    
    public function getName(): ?string
    {
        return $this->name;
    }
    
    public function setName($name): self
    {
        $this->name = $name;
        
        return $this;
    }
    
    public function getCode(): ?string
    {
        return $this->code;
    }
    
    public function setCode($code): self
    {
        $this->code = $code;
        
        return $this;
    }
    
    public function getGoogleCode(): ?string
    {
        return $this->googleCode;
    }
    
    public function setGoogleCode($googleCode): self
    {
        $this->googleCode = $googleCode;
        
        return $this;
    }
    
    public function setProductAttachment(ProductAttachment $productAttachment): self
    {
        $this->productAttachment = $productAttachment;

        return $this;
    }

    public function getProductAttachment(): ?ProductAttachment
    {
        return $this->productAttachment;
    }

    public function setProject(Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }
}
