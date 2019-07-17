<?php

namespace AdventistCommons\Domain\Repository;

use AdventistCommons\Domain\Entity\Series;
use AdventistCommons\Domain\EntityHydrator\Hydrator;

/**
 * Class SeriesRepository
 * @package AdventistCommons\Model
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class SeriesRepository
{
	private $seriesFinder;
	private $hydrator;

	public function __construct(SeriesFinderInterface $seriesFinder, Hydrator $hydrator)
	{
		$this->seriesFinder = $seriesFinder;
		$this->hydrator = $hydrator;
	}

	public function findAll()
	{
		$data = $this->seriesFinder->getSeriesStructureAll();
		$series = [];
		if ($data) {
			foreach ($data['series'] as $seriesData) {
				$series[] = $this->hydrator->hydrate(Series::class, $seriesData);
			}
		}

		return $series;
	}
}
