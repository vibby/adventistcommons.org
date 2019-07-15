<?php

namespace AdventistCommons\Domain\EntityHydrator;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\Entity\Project;

class ProjectHydrator extends Hydrator
{
	private $languageHydrator;

	public function __construct(LanguageHydrator $languageHydrator)
	{
		$this->languageHydrator = $languageHydrator;
	}

	public function hydrateFromProduct(array $data, Product $product): Project
	{
		if ($existing = $this->getCache($data['id'])) {
			return $existing;
		}

		if (isset($data['language'])) {
			$language = $this->languageHydrator->hydrate(reset($data['language']));
			unset($data['language']);
		}
		$project = Hydrator::hydrateProperties(
			new Project(),
			$data
		);
		$project->setLanguage($language);
		$project->setProduct($product);

		$this->setCache($data['id'], $project);

		return $project;
	}
}
