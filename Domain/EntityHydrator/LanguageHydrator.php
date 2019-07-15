<?php

namespace AdventistCommons\Domain\EntityHydrator;

use AdventistCommons\Domain\Entity\Language;

class LanguageHydrator extends Hydrator
{
	public function hydrate(array $data): Language
	{
		if ($existing = $this->getCache($data['id'])) {
			return $existing;
		}

		$language = Hydrator::hydrateProperties(
			$language ?? new Language(),
			$data
		);
		$this->setCache($data['id'], $language);

		return $language;
	}
}
