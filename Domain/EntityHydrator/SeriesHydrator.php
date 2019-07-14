<?php

namespace AdventistCommons\Domain\EntityHydrator;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\Entity\Series;

class SeriesHydrator extends Hydrator
{
	public function hydrate(array $data, Series $series = null): Series
	{
		if ($existing = $this->getCache($data['id'])) {
			return $existing;
		}

		$series = Hydrator::hydrateProperties(
			$series ?? new Series(),
			$data
		);

		$this->setCache($data['id'], $series);

		return $series;
	}
}
