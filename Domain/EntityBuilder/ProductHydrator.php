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

	public function hydrate($productData, $foreignData)
	{
		if ($existing = $this->getCache($productData['product_id'])) {
			return $existing;
		}

		$product = Hydrator::hydrateProperties(
			new Product($productData['name']),
			$productData
		);

		$productAttachmentsIds = [];
		foreach ($foreignData as $row) {
			if (isset($row['product_attachments_id'])
				&& !in_array($row['product_attachments_id'], $productAttachmentsIds)
			) {
				$productAttachmentsIds[] = $row['product_attachments_id'];
				$product->addProductAttachment($this->productAttachmentHydrator->hydrateFromProduct($row, $product));
			}
		}

		$projectIds = [];
		foreach ($foreignData as $row) {
			if (isset($row['projects_id'])
				&& !in_array($row['projects_id'], $projectIds)
			) {
				$projectIds[] = $row['projects_id'];
				$product->addProject($this->projectHydrator->hydrateFromProduct($row, $product));
			}
		}
		$this->setCache($productData['product_id'], $product);

		return $product;
	}
}
