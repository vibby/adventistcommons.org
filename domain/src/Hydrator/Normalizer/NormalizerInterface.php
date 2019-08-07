<?php

namespace AdventistCommons\Domain\Hydrator\Normalizer;

use AdventistCommons\Domain\Metadata\EntityMetadata;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
interface NormalizerInterface
{
    public function normalize(iterable $entityData, EntityMetadata $metaData): iterable ;
}
