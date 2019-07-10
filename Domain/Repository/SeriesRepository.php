<?php

namespace AdventistCommons\Domain\Repository;
use AdventistCommons\Domain\EntityBuilder\SeriesHydrator;

/**
 * Class SeriesRepository
 * @package AdventistCommons\Model
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class SeriesRepository
{
	private $seriesFinder;
	private $seriesHydrator;

	public function __construct(SeriesFinderInterface $seriesFinder, SeriesHydrator $seriesHydrator)
	{
		$this->seriesFinder = $seriesFinder;
		$this->seriesHydrator = $seriesHydrator;
	}

	public function findAll()
	{
		$data = $this->seriesFinder->getSeriesStructureAll();
		$series = [];
		if ($data) {
			foreach ($data['series'] as $seriesData) {
				$series[] = $this->seriesHydrator->hydrate($seriesData);
			}
		}

		return $series;
	}
}
