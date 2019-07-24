<?php

namespace AdventistCommons\Domain\Storage\Putter;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
interface SectionPutterInterface
{
    public function putSectionAndGetId(array $entityData): int;
}
