<?php

namespace AdventistCommons\Domain\Storage\Putter;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
interface SeriesPutterInterface
{
    public function putSeriesAndGetId(array $entityData): int;
}
