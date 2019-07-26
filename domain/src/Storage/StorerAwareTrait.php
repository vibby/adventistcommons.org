<?php

namespace AdventistCommons\Domain\Storage;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
trait StorerAwareTrait
{
    private $storer;
    
    public function setStorer(Storer $storer): void
    {
        $this->storer = $storer;
    }
    
    public function getStorer(): Storer
    {
        if (! $this->storer) {
            throw new Exception('Storer is not set');
        }
        
        return $this->storer;
    }
}
