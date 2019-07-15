<?php

namespace AdventistCommons\Domain\Repository;

/**
 * @package AdventistCommons\Model
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
interface SeriesFinderInterface
{
	/**
	 * Get structure data about all series
	 * @param int $product_id
	 * @return array
	 */
	public function getSeriesStructureAll(): array;
}
