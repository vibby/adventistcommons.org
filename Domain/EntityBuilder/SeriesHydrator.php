<?php

namespace AdventistCommons\Domain\EntityBuilder;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\Entity\Series;

class SeriesHydrator extends Hydrator
{
	public function hydrate($data): Series
	{
		if ($existing = $this->getCache($data['id'])) {
			return $existing;
		}

		$series = Hydrator::hydrateProperties(
			new Series($data['name']),
			$data
		);

		$this->setCache($data['id'], $series);

		return $series;
	}
}
