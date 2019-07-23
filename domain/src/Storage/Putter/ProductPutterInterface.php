<?php

namespace AdventistCommons\Domain\Storage\Putter;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
interface ProductPutterInterface
{
    public function putProductAndGetId(array $entityData): int;
}
