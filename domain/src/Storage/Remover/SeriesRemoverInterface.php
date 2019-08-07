<?php

namespace AdventistCommons\Domain\Storage\Remover;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
interface SeriesRemoverInterface
{
    public function removeSeries(int $seriesId): void;
}
