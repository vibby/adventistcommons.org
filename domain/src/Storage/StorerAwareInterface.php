<?php

namespace AdventistCommons\Domain\Storage;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
interface StorerAwareInterface
{
    public function setStorer(Storer $storer): void;
    
    public function getStorer(): Storer;
}
