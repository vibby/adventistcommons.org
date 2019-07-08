<?php

namespace AdventistCommons\Domain\EntityBuilder;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\Entity\ProductAttachment;

class ProductAttachmentHydrator extends Hydrator
{
	private $languageHydrator;

	public function __construct(LanguageHydrator $languageHydrator)
	{
		$this->languageHydrator = $languageHydrator;
	}

	public function hydrateFromProduct($data, Product $product)
	{
		if ($existing = $this->getCache($data['id'])) {
			return $existing;
		}

		if (isset($data['language'])) {
			$language = $this->languageHydrator->hydrate(reset($data['language']));
			unset($data['language']);
		}
		$productAttachment = Hydrator::hydrateProperties(
			new ProductAttachment(),
			$data
		);
		$productAttachment->setLanguage($language);
		$productAttachment->setProduct($product);

		$this->setCache($data['id'], $productAttachment);

		return $productAttachment;
	}
}
