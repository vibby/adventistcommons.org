<?php

namespace AdventistCommons\Domain\Storage\Putter;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
interface SectionPutterInterface
{
    public function putSectionAndGetId(array $entityData): int;
}
