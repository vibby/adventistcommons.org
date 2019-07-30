<?php

namespace AdventistCommons\Domain\Repository;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
interface SeriesFinderInterface
{
    /**
     * Get structure data about all series
     *
     * @return array
     */
    public function getSeriesStructureAll(): array;
}
