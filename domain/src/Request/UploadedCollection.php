<?php

namespace AdventistCommons\Domain\Request;

use AdventistCommons\Domain\File\Uploaded;
use AdventistCommons\Domain\File\UploadedBuilder;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
class UploadedCollection extends AbstractCollection
{
    protected function validate($item): void
    {
        /** Uploaded $item */
        if (! $item instanceof Uploaded) {
            throw new \LogicException('Uploaded files list can only accept uploaded files.');
        }
    }
    
    /**
     * @param array $files
     * @return UploadedCollection
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public static function buildFromRequestsFiles(array $files): self
    {
        $collection = new self;
        foreach ($files as $name => $fileInfo) {
            if ($file = UploadedBuilder::build($fileInfo)) {
                $collection[$name] = $file;
            }
        }
        
        return $collection;
    }
}
