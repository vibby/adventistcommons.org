<?php

namespace AdventistCommons\Domain\EntityBuilder;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\Entity\Project;

class ProjectHydrator extends Hydrator
{
	private $projets = [];
	private $languageHydrator;

	public function __construct(LanguageHydrator $languageHydrator)
	{
		$this->languageHydrator = $languageHydrator;
	}

	public function hydrateFromProduct($data, Product $product): Project
	{
		if ($existing = $this->getCache($data['projects_id'])) {
			return $existing;
		}

		if (isset($this->projets[$data['id']])) {
			return $this->projets[$data['id']];
		}

		$language = $this->languageHydrator->hydrate($data);

		$project = Hydrator::hydrateProperties(
			new Project($product, $language, $data['status']),
			$data
		);
		$this->setCache($data['projects_id'], $project);

		return $project;
	}
}
