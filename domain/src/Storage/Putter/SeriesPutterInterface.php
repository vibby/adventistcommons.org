<?php

namespace AdventistCommons\Domain\Storage\Putter;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
interface SeriesPutterInterface
{
    public function putSeriesAndGetId(array $entityData): int;
}
