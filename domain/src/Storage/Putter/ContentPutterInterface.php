<?php

namespace AdventistCommons\Domain\Storage\Putter;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
interface ContentPutterInterface
{
    public function putContentAndGetId(array $entityData): int;
}
