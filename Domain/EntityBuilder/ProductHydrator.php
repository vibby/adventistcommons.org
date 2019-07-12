<?php

namespace AdventistCommons\Domain\EntityBuilder;

use AdventistCommons\Domain\Entity\Product;

class ProductHydrator extends Hydrator
{
	private $projectHydrator;
	private $productAttachmentHydrator;

	public function __construct(ProjectHydrator $projectHydrator, ProductAttachmentHydrator $productAttachmentHydrator)
	{
		$this->projectHydrator = $projectHydrator;
		$this->productAttachmentHydrator = $productAttachmentHydrator;
	}

	public function hydrate($productData)
	{
		if (isset($productData['id']) && $existing = $this->getCache($productData['id'])) {
			return $existing;
		}

		$product = Hydrator::hydrateProperties(
			new Product($productData['name']),
			$productData
		);

		if (isset($productData['product_attachment'])) {
			foreach ($productData['product_attachment'] as $productAttachmentData) {
				$product->addProductAttachment($this->productAttachmentHydrator->hydrateFromProduct($productAttachmentData, $product));
			}
		}

		if (isset($productData['project'])) {
			foreach ($productData['project'] as $projectData) {
				$product->addProject($this->projectHydrator->hydrateFromProduct($projectData, $product));
			}
		}
		
		if (isset($productData['id'])) {
			$this->setCache($productData['id'], $product);
		}

		return $product;
	}
}
