<?php

namespace AdventistCommons\Domain\EntityBuilder;

use AdventistCommons\Domain\Entity\Language;

class LanguageHydrator extends Hydrator
{
	public function hydrate($data): Language
	{
		if ($existing = $this->getCache($data['id'])) {
			return $existing;
		}

		$language = Hydrator::hydrateProperties(
			new Language($data['name'], $data['code']),
			$data
		);
		$this->setCache($data['id'], $language);

		return $language;
	}
}
