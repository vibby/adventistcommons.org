<?php

namespace AdventistCommons\Domain\Storage\Putter;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
interface ContentPutterInterface
{
    public function putContentAndGetId(array $entityData): int;
}
