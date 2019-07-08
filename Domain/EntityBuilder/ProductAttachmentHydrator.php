<?php

namespace AdventistCommons\Domain\EntityBuilder;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\Entity\ProductAttachment;

class ProductAttachmentHydrator extends Hydrator
{
	public function hydrateFromProduct($data, Product $product)
	{
		if ($existing = $this->getCache($data['product_attachments_id'])) {
			return $existing;
		}

		$productAttachment = Hydrator::hydrateProperties(
			new ProductAttachment(),
			$data
		);
		$productAttachment->setProduct($product);
		$this->setCache($data['product_attachments_id'], $product);

		return $productAttachment;
	}
}
